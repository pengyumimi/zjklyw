/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
         'auto':true, //是否自动开始上传
         //'debug' : false,// 是否开启浏览器调试
                //'buttonText' : '请选择图片', // 上传按钮文字
                //'fileTypeExts':'*.jpg;*.gif;*.bmp;*.png;*.jpeg', //允许的图片类型
        'fileSizeLimit' : '5MB', // 允许的单张图片的自大值
        'multi' : true, //是否允许多张图片一起上传
        'uploadLimit':3,
        'removeCompleted':false,
        
        'itemTemplate':'<div id="${fileID}" class="uploadify-queue-item">\<a class="cancel" href="javascript:$(\'#${instanceID}\').uploadify(\'cancel\', \'${fileID}\')">删除</a>\
          <p class="data"></p>\
               <p class="fileName">${fileName}</p>\
         </div>',

        //允许上传的文件后缀
        'fileTypeExts': '*.gif;*.jpeg;*.jpg;*.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false

// 'onUploadSuccess' : function(file,data,response){
//                     var obj = jQuery.parseJSON(data);
//                     var imgstr = '<li><img src="'+obj.savepath+'" alt="预览图片" width="80" height="70"><a onclick=goDel(this,"'+obj.savepath+'")>删除</a></li>';
//                     $("#previewImgs").append(imgstr);
//                     $("#saveurl").append(obj.savepath+'|');
//                 }


            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                console.log(data);
                var _this = $("#file_upload_image").val();
                $('#' + file.id).find('.data').html(' 上传成功');
                var a = obj.data + ',';
                var b = _this;
                var v = a + b;
                $("#file_upload_image").attr('value',v);//设置当前input的值
                $("#upload_org_code_img").attr("src",obj.data);
                $('#' + file.id).html("<img src='"+obj.data+"'>");
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});





