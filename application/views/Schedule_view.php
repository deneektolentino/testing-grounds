<div class="panel panel-default">
    <div class="panel-heading">
        <p class="pull-right"><a id="scheduleCreateBtn" href=""><i class="glyphicon glyphicon-plus"></i> Add</a></p>
        <h2 class="h4">Schedules</h2>
    </div>
    <div class="panel-body schedulesPanel">
        <div class="row">
            <ul class="list-group schedulesHeader">
    	        <li class="col-xs-1 list-group-item-custom">Sched ID</li>
				<li class="col-xs-2 list-group-item-custom">room name</li>
    	        <li class="col-xs-2 list-group-item-custom">Subject</li>
				<li class="col-xs-1 list-group-item-custom">Date</li>
				<li class="col-xs-1 list-group-item-custom">Time In</li>
				<li class="col-xs-1 list-group-item-custom">Time Out</li>
				<li class="col-xs-3 list-group-item-custom text-center">Description</li>
            </ul>
        </div>
        <div class="row">
            <ul class="list-group schedulesList">
	            
            </ul>
        </div>
    </div>
</div>
<script type="text/template" id="schedulesTemplate">
    <div class="schedulesItem clearfix">
        <li class="col-xs-2 list-group-item-custom">${Schedule_id}</li>
        <li class="col-xs-2 list-group-item-custom">${Subject}</li>
        <li class="col-xs-2 list-group-item-custom">${Date}</li>
        <li class="col-xs-2 list-group-item-custom">${Time_in}</li>
        <li class="col-xs-2 list-group-item-custom">${Time_out}</li>
		<li class="col-xs-2 list-group-item-custom">${Description}</li>
        <li class="col-xs-1 list-group-item-custom text-center">
            <a class="editButton" href="${updateLink}"><i class="glyphicon glyphicon-pencil" ></i></a> | 
            <a class="deleteButton" href="${deleteLink}"><i class="glyphicon glyphicon-trash"></i></a>
        </li>
    </div>
</script>