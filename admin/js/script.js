$("#container #manageUsers .show-user .btn-warning").click(function() {

    var part = this.parentNode.parentNode.getAttribute('id');
    // alert(part);
	 $("#container  #"+part+" .manage-user").css("display", "table-cell");
	 $("#container  #"+part+" .manage-user .btn-success").css("width", "100%");
	 $("#container  #"+part+" .show-user").css("display", "none");
	

})