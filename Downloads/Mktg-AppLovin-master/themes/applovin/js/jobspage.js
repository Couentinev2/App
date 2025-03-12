var jobList;

function displayJobs(response){
    jobList = response.jobs;

    /* If Greenhouse Api doesn't fail, hide fallback link to greenhouse page*/
    if (jobList != null){
	    jQuery(".jobsContent.listings .fallback").hide();
    }

    jQuery.each(jobList, function(key,val){

    	var url = val.absolute_url;
	    var title = "<span class='title'>"+val.title+"</span>";
        var departmentRaw = val.departments[0].name;
        var departmentId = val.departments[0].id;
	    var apply = "<a href='"+url+"' class='apply' target='_blank'>Apply Now</a>";
	    var location = "<span class='location'>"+val.location.name+"</span>";
        var category = "cat-1";

	    var job = "<h2>" + departmentRaw + "</h2><div class='" + category + "'>" + title + apply + location + "</div>";

	    jQuery(".jobsContent.listings .grid"+departmentId).prepend(job); // container 'grid' DIVs must be set up with corresponding IDs on the HTML page

    });

}
