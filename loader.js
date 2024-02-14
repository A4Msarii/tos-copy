window.onbeforeunload = function() {
  document.getElementById("loading-screen").style.display = "block";
  document.getElementById("index").style.display = "none";
  document.getElementById("header-hide").style.display = "none";
  document.getElementById("contenthome").style.display = "none";
  document.getElementById("content1").style.display = "none";
  document.getElementById("contentacademic").style.display = "none";
  document.getElementById("contentactual").style.display = "none";
  document.getElementById("contentsim").style.display = "none";
  document.getElementById("content2").style.display = "none";
  document.getElementById("contenthome").style.zIndex = "200";
  document.getElementById("contentacademic").style.zIndex = "200";
  document.getElementById("content1").style.zIndex = "200";
  document.getElementById("contentactual").style.zIndex = "200";
  document.getElementById("contentsim").style.zIndex = "200";
  document.getElementById("loading-screen").style.zIndex = "1000";
  //actual page modal
  document.getElementById("clone").style.display = "none";
  document.getElementById("give_academic").style.display = "none";
  document.getElementById("first_confrim").style.display = "none";
  document.getElementById("second_confrim").style.display = "none";
  document.getElementById("ask_admin").style.display = "none";
  //gradesheet modal
  document.getElementById("ask_for_unlock_modal").style.display = "none";
  document.getElementById("unlock").style.display = "none";
  document.getElementById("unaccomplish-training").style.display = "none";
  document.getElementById("additional-training").style.display = "none";
  document.getElementById("confrim").style.display = "none";
  //academic modal
  document.getElementById("open-files").style.display = "none";
  document.getElementById("send-instructor").style.display = "none";
  document.getElementById("give_academic").style.display = "none";
  //add item subitem modal
  // document.getElementById("item-bank").style.position = "absolute";
document.getElementById("item-bank").style.zIndex = "500";
  // document.getElementById("item-bank").style.display = "none";
  document.getElementById("insert_subitem").style.display = "none";
  document.getElementById("edititem").style.display = "none";
  document.getElementById("editsubitem").style.display = "none";
  //add warning data modal
  document.getElementById("editcat").style.display = "none";
  //add type modal
  document.getElementById("add_marks_modal").style.display = "none";
  //descipline modal
  document.getElementById("editdiscipline").style.display = "none";
  //memo modal
  document.getElementById("editmemo").style.display = "none";
  //new course modal
  document.getElementById("newins").style.display = "none";
  document.getElementById("newuser").style.display = "none";
  //phase modal
  document.getElementById("editphase").style.display = "none";
  //class modal
  document.getElementById("editactual").style.display = "none";
  document.getElementById("editsim").style.display = "none";
  document.getElementById("editacademic").style.display = "none";
  document.getElementById("edittest").style.display = "none";
  //prereuisites modal
  // document.getElementById("prere").style.display = "none";
  document.getElementById("prere").style.zIndex = "500";
  document.getElementById("prere_day").style.display = "none";
  //profile modal
  document.getElementById("change_pass").style.display = "none";
  document.getElementById("add_initial").style.display = "none";
  //testing modal
  document.getElementById("testmodal1").style.display = "none";
  document.getElementById("testmodal").style.display = "none";
  //datapage modal
  document.getElementById("Prereuisites_modal1").style.display = "none";
  document.getElementById("addpercentage").style.display = "none";
  document.getElementById("select_ctp_type").style.display = "none";
  //header modal
  document.getElementById("newuser_head").style.display = "none";
  document.getElementById("add_cate_head").style.display = "none";
  document.getElementById("addvehicle_head").style.display = "none";
  document.getElementById("vehicle_list_head").style.display = "none";
  document.getElementById("editvehicle").style.display = "none";
  document.getElementById("acedemic_modal").style.display = "none";
  document.getElementById("course_list_head").style.display = "none";
  document.getElementById("editcourse").style.display = "none";
  document.getElementById("select_ctp_head").style.display = "none";
  document.getElementById("ctp_data_head").style.display = "none";
  document.getElementById("editctp").style.display = "none";
  document.getElementById("per_list_head").style.display = "none";
  document.getElementById("per_table_head").style.display = "none";
  document.getElementById("Prereuisites_modal").style.display = "none";
  document.getElementById("edit_percentage_head").style.display = "none";
  document.getElementById("department_list_head").style.display = "none";
  document.getElementById("edit_department_head").style.display = "none";



}
document.body.onload = function() {
  document.getElementById("loading-screen").style.display = "none";
  document.getElementById("content").style.display = "block";
  document.getElementById("header-hide").style.display = "block";
  document.getElementById("content1").style.display = "block";
 
};
