$("#formEditExam").ready(function(){
		function GetDoctorFromSelectExam()
		{
			var w = document.formEditExam.doctorsList.selectedIndex;
			var selected_text = document.formEditExam.doctorsList.options[w].text;
			return selected_text;
		} 

		function GetCategoryFromSelectExam()
		{
			var w = document.formEditExam.categoriesList.selectedIndex;
			var selected_text = document.formEditExam.categoriesList.options[w].text;
			return selected_text;
		} 
		$("<input type='hidden' name='doctor' value='"+GetDoctorFromSelectExam()+"'/>").appendTo(".form");

		$("<input type='hidden' name='category' value='"+GetCategoryFromSelectExam()+"'/>").appendTo(".form");
		$("#doctorsList").change(function(){

			//alert(GetIdFromSelect());
			//var html = $(".form").html();
			$("<input type='hidden' name='doctor' value='"+GetDoctorFromSelectExam()+"'/>").appendTo(".form");
		});

		$("#convenioList").change(function(){
			var html = $(".form").html();
			$("<input type='hidden' name='category' value='"+GetCategoryFromSelectExam()+"'/>").appendTo(".form");

		}); 
		alert("kkkkk");
	});