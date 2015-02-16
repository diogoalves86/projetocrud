$(document).ready(function(){
		function GetDoctorFromSelect()
		{
			var w = document.formNewExam.doctorsList.selectedIndex;
			var selected_text = document.formNewExam.doctorsList.options[w].text;
			return selected_text;
		} 
		//$("<input type='hidden' name='doctor' value='"+GetDoctorFromSelect()+"'/>").appendTo(".form");
		//
		//Verifica se foi preenchida a combobox.

		$("#doctorsList").change(function(){

			alert(GetDoctorFromSelect());
			//var html = $(".form").html();
			$("<input type='hidden' name='doctor' value='"+GetDoctorFromSelect()+"'/>").appendTo(".form");
		});
});