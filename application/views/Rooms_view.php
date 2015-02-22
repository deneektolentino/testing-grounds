<div class="panel panel-default">
    <div class="panel-heading">
        <p class="pull-right"><a id="roomsCreateBtn" href=""><i class="glyphicon glyphicon-plus"></i> Add</a></p>
        <h2 class="h4">Rooms</h2>
    </div>
    <div class="panel-body roomsPanel">
        <div class="row">
            <ul class="list-group roomsHeader">
    	        <li class="col-xs-2 list-group-item-custom">Room ID</li>
    	        <li class="col-xs-4 list-group-item-custom">Room Name</li>
				<li class="col-xs-4 list-group-item-custom">Building Name</li>
				<li class="col-xs-2 list-group-item-custom text-center">Actions</li>
            </ul>
        </div>
        <div class="row">
            <ul class="list-group roomsList">
	            
            </ul>
        </div>
    </div>
</div>
<script type="text/template" id="roomsTemplate">
    <div class="roomsItem clearfix">
        <li class="col-xs-2 list-group-item-custom">${Room_id}</li>
        <li class="col-xs-4 list-group-item-custom">${Room_Name}</li>
		<li class="col-xs-4 list-group-item-custom">${Bldg_Name}</li>
        <li class="col-xs-2 list-group-item-custom text-center">
            <a class="editButton" href="${updateLink}"><i class="glyphicon glyphicon-pencil" ></i></a> | 
            <a class="deleteButton" href="${deleteLink}"><i class="glyphicon glyphicon-trash"></i></a>
        </li>
    </div>
</script>