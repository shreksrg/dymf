<?php
/**
 * 栏目逻辑操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class model_myclass extends model_base {
	/**
	 * 栏目页面
	 */
	public static function add_integral($data = array()) {
		$sql = "
        insert into `learning` (" . implode(",", array_keys($data)) . ",raw_add_time,raw_update_time) values (" . static_base::str4insert_prepare($data) . ",now(),now())
        ";
		$rs = self::DB() -> prepare($sql);
		return $rs -> execute($data);
	}

	public static function Statistics_9($user) {
		$sql = "select 
sum(case when learning_type='皈依' then integral else 0 end) as gy,
sum(case when learning_type='发心' then integral else 0 end) as fx,
sum(case when learning_type='除障法' then integral else 0 end) as czf,
sum(case when learning_type='曼茶罗' then integral else 0 end) as mcl,
sum(case when learning_type='上师瑜伽' then integral else 0 end) as ssyj,
sum(integral) as sum_integral
 from learning where user_id=? and part_id=9 and  learning_type='皈依' or  learning_type='发心' or  learning_type='除障法' or  learning_type='曼茶罗' or  learning_type='上师瑜伽'";

		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array($user));
		return $rs -> fetch();
	}

	public static function Statistics_10($user) {
		$sql = "select 
sum(case when learning_type='阿弥陀佛心咒' then integral else 0 end) as xz,
sum(case when learning_type='阿弥陀佛圣号' then integral else 0 end) as sh,
sum(integral) as sum_integral
 from learning where user_id=? and part_id=10 and learning_type='阿弥陀佛心咒' or learning_type='阿弥陀佛圣号'";

		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array($user));
		return $rs -> fetch();
	}

	public static function get_learning_list($top) {
		$sql = "
		select user_fullname,raw_add_time,learning_type,part_name from learning
		order by learning_id desc
		 limit $top
		";
		return self::DB() -> query($sql) -> fetchAll();
	}
	/*
	 * 净土班念诵排行榜
	 */
	public static function statistics_top() {
		$sql = "select user_fullname,sum(integral) as sum_integral 
		from learning 
		where part_id=10 and learning_type='阿弥陀佛心咒' or learning_type='阿弥陀佛圣号' group by user_fullname 
order by sum_integral desc limit 10";
return self::DB() -> query($sql) -> fetchAll();
	}
	//课诵及功德排行榜
	public static function ks_top() {
		$sql = "select user_fullname,sum(integral) as sum_integral 
		from learning 
		where part_id=39 group by user_fullname 
order by sum_integral desc limit 10";
return self::DB() -> query($sql) -> fetchAll();
	}
/*
	 * 闻思班闻法排行榜
	 */
	public static function wf_top() {
		$sql = "select user_fullname,sum(integral) as sum_integral 
		from learning 
		where part_id=11 and learning_type='闻法' group by user_fullname 
order by sum_integral desc limit 10";
return self::DB() -> query($sql) -> fetchAll();
	}
	/*
	 * 加行班观修排行榜
	 */
	public static function gx_top() {
		$sql = "select user_fullname,sum(integral) as sum_integral 
		from learning 
		where part_id=10 and learning_type='观修' group by user_fullname 
order by sum_integral desc limit 10";
return self::DB() -> query($sql) -> fetchAll();
	}
	/*
	 * 五加行实修排行榜
	 */
	public static function sx_top() {
		$sql = "select user_fullname,sum(integral) as sum_integral 
		from learning 
		where part_id=9 and learning_type='皈依' or  learning_type='发心' or  learning_type='除障法' or  learning_type='曼茶罗' or  learning_type='上师瑜伽' group by user_fullname 
order by sum_integral desc limit 10";
return self::DB() -> query($sql) -> fetchAll();
	}
}
