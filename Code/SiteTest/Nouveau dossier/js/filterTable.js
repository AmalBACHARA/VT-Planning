$(document).ready(function() {
   $('.footable').footable().bind('footable_filtering', function (e)
	{
		var selected = $('.filter-status').find(':selected').text();
		if (selected && selected.length > 0)
		{
			e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
			e.clear = !e.filter;
		}
	});
   
   $('.sort-column').click(function (e) {
		e.preventDefault();
		//get the footable sort object
        var footableSort = $('table').data('footable-sort');
		//get the index we are wanting to sort by
		var index = $(this).data('index');
		footableSort.doSort(index, 'toggle');
	});
	
});
