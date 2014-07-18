// dashboard.action.js
$(function(){
	adjust_height(['.sidebar', '.main-panel', '.rightbar'],[2,0,0]);
	clock();
	setInterval('clock()',5000);
	$('#editor').wysiwyg();
	init_link_btn();
	init_sortable();
});

// dashboard.lib.js
function clock() {
	var date = new Date();
	$('#date-time .time').html('<big>' + date.format('HH') + '</big>' + date.format('mm'));
	$('#date-time .date').html('<small>' + date.format('MMM dd yyyy, ddd') + '</small>');
}

function adjust_height(box_list,weight) {
	var height = 0;
	for (i in box_list) {
		$(box_list[i]).height() > height ? height = $(box_list[i]).height() : false;
	}
	for (i in box_list) {
		$(box_list[i]).height(height + weight[i]);
	}
	//$(box_list.join()).height(height + );
}

function init_link_btn() {
	$('#popover-add-link-btn').attr('style','top:' + ($('#editor').height() - 35) + 'px;');
	$('#add-link-btn,#popover-add-link-btn .close,#popover-add-link-btn button').on('click',function(){
		$('#popover-add-link-btn').toggleClass('in');
	});
}

function init_sortable() {
	$('.sortable').nestedSortable({
		handle: '.handle',
		items: 'li.sortitem',
		toleranceElement: '> div'
	});
}