<div class="panel panel-default">
    <div class="panel-heading">
        <p class="pull-right"><a id="buildingsCreateBtn" href=""><i class="glyphicon glyphicon-plus"></i> Add</a></p>
        <h2 class="h4">Buildings</h2>
    </div>
    <div class="panel-body buildingsPanel">
        <div class="row">
            <ul class="list-group buildingsHeader">
    	        <li class="col-xs-2 list-group-item-custom">Building ID</li>
    	        <li class="col-xs-8 list-group-item-custom">Building Name</li>
    	        <li class="col-xs-2 list-group-item-custom text-center">Actions</li>
            </ul>
        </div>
        <div class="row">
            <ul class="list-group buildingsList">
	            
            </ul>
        </div>
    </div>
</div>
<script type="text/template" id="buildingsTemplate">
    <div class="buildingsItem clearfix">
        <li class="col-xs-2 list-group-item-custom">${Bldg_id}</li>
        <li class="col-xs-8 list-group-item-custom">${Bldg_Name}</li>
        <li class="col-xs-2 list-group-item-custom text-center">
            <a class="editButton" href="${updateLink}"><i class="glyphicon glyphicon-pencil" ></i></a> | 
            <a class="deleteButton" href="${deleteLink}"><i class="glyphicon glyphicon-trash"></i></a>
        </li>
    </div>
</script>