/*=====================================================
	�y�[�W�̐擪��
=====================================================*/
$(function() {
    var topBtn = $('#pgtp');    
    //�ŏ��̓{�^�����B��
    topBtn.hide();
    //�X�N���[����300�ɒB������{�^����\��������
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //�X�N���[�����ăg�b�v�ɖ߂�
    //500�̐�����傫������ƃX�N���[�����x���x���Ȃ�
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

/*=====================================================
	�X���[�X�X�N���[��
=====================================================*/
$(function(){
  $('a[href^=#]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

/*=====================================================
	Roll Over
=====================================================*/
(function($) {
$(function() {
  $('.ro').wink();
});
})(jQuery);

(function($) {

	$.fn.wink = function(durationp,op,oa){

		var c = {
			durationp:durationp? durationp:'slow',
			op:op? op:1.0,
			oa:oa? oa:0.4
		};
		
		$(this).each(function(){
			$(this)	.css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				}).hover(function(){
				$(this).css({
					opacity: c.oa,
					filter: "alpha(opacity="+c.oa*100+")"
				});
				$(this).fadeTo(c.durationp,c.op);
			},function(){
				$(this).css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				});
			})
		});
	}
	
})(jQuery);

/*=====================================================
	�R�s�[���C�g�N��
=====================================================*/
function year() {  var data = new Date();  var now_year = data.getFullYear();  document.write(now_year);  }