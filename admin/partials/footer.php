<!-- start footer -->
<div class="page-footer">
	<div class="page-footer-inner"> <?php echo date('Y') ?> &copy; DIM
		<a href="mailto:181400106@gift.edu.pk" target="_top" class="makerCss">Digital Ink Market</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- end footer -->
</div>
<!-- start js include path -->
<script src="../General_Assets/assets/plugins/jquery/jquery.min.js"></script>
<script src="../General_Assets/assets/plugins/popper/popper.min.js"></script>
<script src="../General_Assets/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../General_Assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../General_Assets/assets/plugins/counterup/jquery.waypoints.min.js"></script>
<script src="../General_Assets/assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- bootstrap -->
<script src="../General_Assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- data tables -->
<script src="../General_Assets/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../General_Assets/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="../General_Assets/assets/js/pages/table/table_data.js"></script>
<!-- Common js-->
<script src="../General_Assets/assets/js/app.js"></script>
<script src="../General_Assets/assets/js/layout.js"></script>
<script src="../General_Assets/assets/js/theme-color.js"></script>
<!-- Material -->
<script src="../General_Assets/assets/plugins/material/material.min.js"></script>
<!-- animation -->
<script src="../General_Assets/assets/js/pages/ui/animations.js"></script>
<!-- end js include path -->
<!-- Sweet Alert -->
<script src="../General_Assets/assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="../General_Assets/assets/js/pages/sweet-alert/sweet-alert-data.js"></script>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="../General_Assets/assets/js/jquery.tabletoCSV.js"></script>

<script>
	function ff() {
		alert("Hello ff");
	}
	//    var dataId = $('.dat_id_val').text();
	// var sus_user_id= $('.modal_sus_u_id').val(dataId);
	$(document).ready(function() {
		$(".suspend_btn").on("click", function() {
			var stu_id=$(this).closest('tr').find('.stu_id').text();

			// $('.modal_sus_u_id').text(modal_sus_u_id);
			var ee=$('.modal_sus_u_id').val(stu_id);
			
		});
		$("#suspend_form_btn").on("click", function(e) {
			e.preventDefault();
			
			var sus_userId = $('.modal_sus_u_id').val();
			var sus_date_suspend=$('#suspend_date').val();
			// alert("helo Data: "+sus_userId);
			// alert("helo Data: "+sus_date_suspend);
				$.post('suspend_request.php',{
			    Sus_method: "Suspend",
				suspend_date:sus_date_suspend,
			    sus_user_id: sus_userId
			  },
			  function(data, status){
				  document.location.href="manage_user.php";
			    alert("Data: " + data + "\nStatus: " + status);
			  });
		});


	
		var site_url = "http://localhost/Dashboard-1/"
		$('#example4_filter').html("<form method='post'><div class='btn-group pull-right'><button class='btn btn-success text-light medium_b_raius  btn-outline dropdown-toggle' data-toggle='dropdown'>Filter By User Category<i class='fa fa-angle-down'></i></button><ul class='dropdown-menu pull-right'><li id='filter_buyer'><a href='javascript:;' ><i class='fa fa-user-o'></i> Buyer </a></li><li id='filter_designer'><a href='javascript:;' ><i class='fa fa-user-o'></i> Designer </a></li><li id='filter_vendor'><a href='javascript:;' ><i class='fa fa-user-o'></i> Vendor </a></li></ul></div></form>");

		$('#filter_buyer').click(function() {
			// alert(location.href);
			site_url = site_url + "view_users.php?search=buyer";
			if (location.href != site_url) {
				location.href = "view_users.php?search=buyer";
			}

		}); //#filter_buyer
		$('#filter_designer').click(function() {
			site_url = site_url + "view_users.php?search=designer";
			if (location.href != site_url) {
				location.href = "view_users.php?search=designer";
			}
		});
		$('#filter_vendor').click(function() {
			site_url = site_url + "view_users.php?search=vendor";
			if (location.href != site_url) {
				location.href = "view_users.php?search=vendor";
			}
		});

		// TimeOut
		const myTimeout = setTimeout(timeOut, 1000);

		function timeOut() {
			$(".timeout").hide(1000);
		}
		// var options = {'filename':'dim_report.csv'}
		$('.save_csv').click(function() {
			$("#example4").tableToCSV();
		});
		$('.save_pdf').click(function() {
			alert("Hello");
			html2canvas($('#to_pdf')[0], {
				onrendered: function(canvas) {
					var data = canvas.toDataURL();
					var docDefinition = {
						content: [{
							image: data,
							width: 500
						}]
					};
					pdfMake.createPdf(docDefinition).download("customer-details.pdf");
				}
			});
		});
	});
</script>

</html>