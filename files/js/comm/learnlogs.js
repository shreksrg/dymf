//var clsCodes = ['ws', 'jt', 'jx']; //学修班编码组


/**
 * 序列化统计项数据并返回
 * @return Array 统计项数组
 */
function serializeCountData() {
    var stats = new Array();
    $('[cscode]').each(function (i) {
        var cscode = $(this).attr('cscode');
        var mc = $(this).find('input[citem=mc]').val();
        var sc = $(this).find('input[citem=sc]').val();
        var stat = {'cstatcode': cscode, 'monthcount': mc, 'sumcount': sc}
        stats.push(stat);
    });
    return stats;
}

/**
 * 设置提交数据
 * @return Array 统计项数组
 */
function setSubmitData() {
    // var stuid = $('input[name=stuid]').val();
    var stats = serializeCountData();
    var data = {'clscode': clsCode, 'stats': stats, 'year': $('[name=xx_year]').val(), 'month': $('[name=xx_month]').val()}

    return data;
}

/**
 * 提交统计项表单
 * @return Array 统计项数组
 */
function submitCountForm() {
    var frm = $('#frmLearner'), url = frm.attr('action');
    var isValid = frm.form('validate');

    if (isValid) {
        $.post(url, setSubmitData(), function (r) {
            $.messager.alert('提示', r['content'])
        }, 'json')
    }
}

/**
 * 获取指定学修班统计项累计数记录
 * @return Array 统计项数组
 */
function getClassStatsForSum() {
    var url = '/?c=learnlogs&st=ClassStatsForSum';
    $.post(url, {'clscode': 'ws'}, function (rows) {
        for (var i in rows) {
            $('[cscode=' + rows[i]['cstatcode'] + '] input[citem=sc]').numberbox('setValue', rows[i]['sumcount']);
        }
    }, 'json')
}


$('p[cscode] input').numberbox({
    required: true,
    min: 0,
    max: 1000
})

getClassStatsForSum();




