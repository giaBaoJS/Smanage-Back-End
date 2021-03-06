$(window).on('load', function () {
	/** MENU */
	if ($('#side-menu').length) {
		$('#side-menu').metisMenu(),
			$('#vertical-menu-btn').on('click', function (t) {
				t.preventDefault(),
					$('body').toggleClass('sidebar-enable'),
					992 <= $(window).width()
						? $('body').toggleClass('vertical-collpsed')
						: $('body').removeClass('vertical-collpsed');
			}),
			$('#sidebar-menu a').each(function () {
				const t = window.location.href.split(/[?#]/)[0];
				this.href == t &&
					($(this).addClass('active'),
						$(this).parent().addClass('mm-active'),
						$(this).parent().parent().addClass('mm-show'),
						$(this).parent().parent().prev().addClass('mm-active'),
						$(this).parent().parent().parent().addClass('mm-active'),
						$(this).parent().parent().parent().parent().addClass('mm-show'),
						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.addClass('mm-active'));
			}),
			$('.navbar-nav a').each(function () {
				const t = window.location.href.split(/[?#]/)[0];
				this.href == t &&
					($(this).addClass('active'),
						$(this).parent().addClass('active'),
						$(this).parent().parent().addClass('active'),
						$(this).parent().parent().parent().parent().addClass('active'),
						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.addClass('active'),
						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.addClass('active'),
						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.parent()
							.addClass('active'));
			}),
			$('.dropdown-menu a.dropdown-toggle').on('click', function (t) {
				return (
					$(this).next().hasClass('show') ||
					$(this)
						.parents('.dropdown-menu')
						.first()
						.find('.show')
						.removeClass('show'),
					$(this).next('.dropdown-menu').toggleClass('show'),
					!1
				);
			}),
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			}),
			$(function () {
				$('[data-toggle="popover"]').popover();
			});
	}
	/** MENU - END */

	/** YEARLY - CHART */
	if ($('#yearly-sale-chart').length) {
		var role = $('#role').val();
		if (role == 1) {
			$.ajax({
				url: "http://127.0.0.1:8000/api/admin/chart",
				type: "get",
				success: function (data) {
					var text = [data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12]];
					const options = {
						chart: { height: 330, type: 'area', toolbar: { show: !1 } },
						colors: ['#3051d3', '#e4cc37', '#e9cc99', '#CD853F', '#191970'],
						dataLabels: { enabled: false },
						// gọi ajax để lấy dữ liệu
						series: [
							// {name: '2017', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},
							// {name: '2018', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},
							// {name: '2019', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},
							{ name: '2020', data: text },
							// {name: '2021', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},

						],
						grid: { yaxis: { lines: { show: !1 } } },
						stroke: { width: 3, curve: 'stepline' },
						markers: { size: 5 },
						xaxis: {
							categories: [
								'Tháng 1',
								'Tháng 2',
								'Tháng 3',
								'Tháng 4',
								'Tháng 5',
								'Tháng 6',
								'Tháng 7',
								'Tháng 8',
								'Tháng 9',
								'Tháng 10',
								'Tháng 11',
								'Tháng 12',
							],
							title: { text: 'Thống kê theo tháng' },
						},
						fill: {
							type: 'gradient',
							gradient: {
								shadeIntensity: 1,
								opacityFrom: 0.7,
								opacityTo: 0.9,
								stops: [0, 90, 100],
							},
						},
						legend: {
							position: 'top',
							horizontalAlign: 'right',
							floating: !0,
							offsetY: -25,
							offsetX: -5,
						},
					};
					(chart = new ApexCharts(
						document.querySelector('#yearly-sale-chart'),
						options
					)).render();
				}
			});
		} else {
			$.ajax({
				url: "http://127.0.0.1:8000/api/admin/chart-admin",
				type: "get",
				success: function (data) {
					var text = [data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12]];
					const options = {
						chart: { height: 330, type: 'area', toolbar: { show: !1 } },
						colors: ['#3051d3', '#e4cc37', '#e9cc99', '#CD853F', '#191970'],
						dataLabels: { enabled: false },
						// gọi ajax để lấy dữ liệu
						series: [
							// {name: '2017', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},
							// {name: '2018', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},
							{ name: '2019', data: [0, 0, 0, 0, 0, 0, 600000, 700000, 0, 0, 0, 9000000] },
							{ name: '2020', data: text },
							// {name: '2021', data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]},

						],
						grid: { yaxis: { lines: { show: !1 } } },
						stroke: { width: 3, curve: 'stepline' },
						markers: { size: 5 },
						xaxis: {
							categories: [
								'Tháng 1',
								'Tháng 2',
								'Tháng 3',
								'Tháng 4',
								'Tháng 5',
								'Tháng 6',
								'Tháng 7',
								'Tháng 8',
								'Tháng 9',
								'Tháng 10',
								'Tháng 11',
								'Tháng 12',
							],
							title: { text: 'Thống kê theo tháng' },
						},
						fill: {
							type: 'gradient',
							gradient: {
								shadeIntensity: 1,
								opacityFrom: 0.7,
								opacityTo: 0.9,
								stops: [0, 90, 100],
							},
						},
						legend: {
							position: 'top',
							horizontalAlign: 'right',
							floating: !0,
							offsetY: -25,
							offsetX: -5,
						},
					};
					(chart = new ApexCharts(
						document.querySelector('#yearly-sale-chart'),
						options
					)).render();
				}
			});
		}


	}
	/** YEARLY - CHART - END */

	/** GALLERY */
	if ($('.gallery-categories-filter').length) {
		const i = $('.projects-wrapper'),
			e = $('#filter');
		i.isotope({
			filter: '*',
			layoutMode: 'masonry',
			animationOptions: { duration: 750, easing: 'linear' },
		}),
			e.find('a').click(function () {
				const a = $(this).attr('data-filter');
				return (
					e.find('a').removeClass('active'),
					$(this).addClass('active'),
					i.isotope({
						filter: a,
						animationOptions: {
							animationDuration: 750,
							easing: 'linear',
							queue: !1,
						},
					}),
					!1
				);
			});
		$('.gallery-popup').magnificPopup({
			type: 'image',
			closeOnContentClick: !0,
			mainClass: 'mfp-fade',
			gallery: { enabled: !0, navigateByImgClick: !0, preload: [0, 1] },
		});
	}
	/** GALLERY - END */

	/** DATATABLE */
	if ($('.datatable').length) {
		const DataTable = $('.datatable');

		$('.datatable')
			.DataTable({
				responsive: true,
				dom:
					"<'row'<'col-sm-12 col-md-6 mb-2 p-0 'B><'col-sm-12 col-md-6 d-flex justify-content-md-end'l>>" +
					"<'row'<'col-sm-12'tr>>" +
					"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
				buttons: [
					{
						extend: 'copy',
						className: 'bg-white-cl main-cl font-weight-bold',
					},
					{
						extend: 'excel',
						className: 'bg-white-cl main-cl font-weight-bold',
					},
					{
						extend: 'pdf',
						className: 'bg-white-cl main-cl font-weight-bold',
					},
					{
						extend: 'print',
						className: 'bg-white-cl main-cl font-weight-bold',
					},
				],
				language: {
					sProcessing: 'Đang xử lý...',
					sLengthMenu:
						'<b>Hiển thị</b>&#160;&#160;_MENU_ <b>&#160;&#160;nội dung</b>',
					sZeroRecords: 'Không tìm thấy nội dung phù hợp',
					sInfo:
						'Bạn đang xem <b>_START_</b> đến <b>_END_</b> trong tổng số <b>_TOTAL_</b> mục',
					sInfoEmpty: 'Không có mục nào để hiển thị',
					sInfoFiltered: '(được lọc từ _MAX_ mục)',
					sInfoPostFix: '',
					sSearch: 'Tìm kiếm:',
					sUrl: '',
					oPaginate: {
						sFirst: 'Trang đầu',
						sLast: 'Trang cuối',
						sNext: '<i class="mdi mdi-chevron-right"></i>',
						sPrevious: `<i class="mdi mdi-chevron-left"></i>`,
					},
				},
				drawCallback: function () {
					// $('.dataTables_paginate > .pagination ').addClass(
					// 	'pagination pagination-rounded justify-content-sm--center mb-0'
					// );
					$('.dataTables_paginate > .pagination ').addClass(
						'pagination pagination-rounded justify-content-sm--center mb-0'
					);
				},
			})
			.buttons()
			.container()
			.appendTo('.datatable_wrapper .col-md-12:eq(0)');
	}
	/** DATATABLE - END */

	/** VECTOR MAP */
	/** VECTOR MAP - END */

	/** VALIDATE FORM */
	window.addEventListener('load', function () {
		var t = document.getElementsByClassName('needs-validation');
		Array.prototype.filter.call(t, function (e) {
			e.addEventListener(
				'submit',
				function (t) {
					!1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()),
						e.classList.add('was-validated');
				},
				!1
			);
		});
	});

	$(document).ready(function () {
		if ($('.custom-validation').length) {
			$('.custom-validation').parsley();
		}
	});
	/** VALIDATE FORM - END*/

	/** TYNIMCE */
	0 < $('#elm1').length &&
		tinymce.init({
			selector: 'textarea#elm1',
			height: 300,
			plugins: [
				'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				'save table contextmenu directionality emoticons template paste textcolor',
			],
			toolbar:
				'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons',
			style_formats: [
				{ title: 'Bold text', inline: 'b' },
				{ title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
				{ title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
				{ title: 'Example 1', inline: 'span', classes: 'example1' },
				{ title: 'Example 2', inline: 'span', classes: 'example2' },
				{ title: 'Table styles' },
				{ title: 'Table row 1', selector: 'tr', classes: 'tablerow1' },
			],
		});
	/** TYNIMCE - END */
});

//Change tab tour
$(".add-form-tours .items").click(function (e) {
	$(".add-form-tours .items").removeClass("active");
	$(this).addClass("active");
	let id = $(this).attr("data-tab");
	$(".tabsz").removeClass("active");
	$("." + id).addClass("active");
});
//Next tab 2
$(".group-my-btn .mybtn.tab1").click(function (e) {
	$(".add-form-tours .items").removeClass("active");
	$(".add-form-tours .items.tabl2").addClass("active");
	$(".group-forms.tab2 ").addClass("active");
	$(".group-forms.tab1 ").removeClass("active");
});
//Next tab 3
$(".group-my-btn .mybtn.tab2").click(function (e) {
	$(".add-form-tours .items").removeClass("active");
	$(".add-form-tours .items.tabl3").addClass("active");
	$(".group-forms.tab3 ").addClass("active");
	$(".group-forms.tab2 ").removeClass("active");
});

//Trở lại tab 1 từ tab2

$(".group-my-btn .mybtn.tab2-ql").click(function (e) {
	$(".add-form-tours .items").removeClass("active");
	$(".add-form-tours .items.tabl1").addClass("active");
	$(".group-forms.tab1 ").addClass("active");
	$(".group-forms.tab2 ").removeClass("active");
});
// Trở lại tab 2 từ tab 3
$(".group-my-btn .mybtn.tab3").click(function (e) {
	$(".add-form-tours .items").removeClass("active");
	$(".add-form-tours .items.tabl2").addClass("active");
	$(".group-forms.tab2 ").addClass("active");
	$(".group-forms.tab3 ").removeClass("active");
});
function formatNumber(nStr, decSeperate, groupSeperate) {
	nStr += '';
	x = nStr.split(decSeperate);
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
	}
	return x1 + x2;
}
