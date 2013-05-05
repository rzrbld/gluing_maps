 $(document).ready(function(){
        getMenuData();
        $('#zoom').change(function(){
          getMenuData();
        });
        $('#preview').click(function(){
          getPreview();
        });
        $('#generate').click(function(){
          getImage();
        });
        $('#spanbasic').hide();
        $('.advanced').hide();

        $('#advanced').click(function(){
          $('.advanced').show();
          $('#spanbasic').show();
          $('#spanadvanced').hide();
        });

        $('#basic').click(function(){
          $('.advanced').hide();
          $('#spanadvanced').show();
          $('#spanbasic').hide();
        });
      });

      function getMenuData(){
        $.get("backend.php", { action: 'getMenu',zoom: $('#zoom').val()})
        .done(function(data) {
          $('body').append(data);
        });
      }

      function getPreview_DEPRICATED(){
         $.get("backend.php", { action: 'getPreview',size:$('#size').val(),key:$('#key').val(),centerN:$('#centerN').val(),centerE:$('#centerE').val(),zoom: $('#zoom').val(),scale:$('#scale').val() })
        .done(function(data) {
         $('#previewArea').empty().append("<img src='"+data+"' width='640' height='640' class='img-polaroid'>");
        });
      }

      function getPreview(){
         $.get("backend.php", { action: 'getImage',size:$('#size').val(),key:$('#key').val(),centerN:$('#centerN').val(),centerE:$('#centerE').val(),zoom: $('#zoom').val(),scale:$('#scale').val(),ctocE:$('#ctocE').val(),ctocN:$('#ctocN').val(),width:'1600',height:'840' })
        .done(function(data) {
         $('#previewArea').empty().append("<img src='"+data+"' width='920' height='535' ><br><span>Not actual size. Click <a href='"+data+"'>Here</a> to enlarge</span>");
        });
      }

      function getImage(){
         $.get("backend.php", { action: 'getImage',size:$('#size').val(),key:$('#key').val(),centerN:$('#centerN').val(),centerE:$('#centerE').val(),zoom: $('#zoom').val(),scale:$('#scale').val(),ctocE:$('#ctocE').val(),ctocN:$('#ctocN').val(),width:$('#width').val(),height:$('#height').val() })
        .done(function(data) {
         $('#previewArea').empty().append("<a href='"+data+"'>Download result</a>");
        });
      }