//  点赞按钮点击
$('#agree').on('click', function () {

    //  发送 AJAX 请求
    $.ajax({
      //  请求方式 post
      type: 'post',
      //  url 获取点赞按钮的自定义 url 属性
      url: $('#agree').attr('data-url'),
      //  发送的数据 cid，直接获取点赞按钮的 cid 属性
      data: 'agree=' + $('#agree').attr('data-cid'),
      async: true,
      timeout: 30000,
      cache: false,
      //  请求成功的函数
      success: function (data) {
        var re = /\d/;  //  匹配数字的正则表达式
        //  匹配数字
        if (re.test(data)) {
          //  把点赞按钮中的点赞数量设置为传回的点赞数量
          $('#agree .agree-num').html(data);
        }
        
          //这里可以添加点赞成功后的效果代码，根据自身需求添加
          
          $('#agree').get(0).disabled = true;  //  禁用点赞按钮
      },
      error: function () {
        //  如果请求出错就恢复点赞按钮
        $('#agree').get(0).disabled = false;
      },
    });
  });