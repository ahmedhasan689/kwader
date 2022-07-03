$(function() {

	new Morris.Donut({
		element: 'users',
		data: [{
			label: 'Male',
			value: $('#male_employee').val(),
		}, {
			label: 'Female',
			value: $('#female_employee').val(),
		}],
		colors: ['#285cf7', '#f7557a'],
		resize: true,
		labelColor:"#8c9fc3"
	});

    new Morris.Donut({
        element: 'employer',
        data: [{
            label: 'Male',
            value: $('#male_employers').val(),
        }, {
            label: 'Female',
            value: $('#female_employers').val(),
        }],
        colors: ['#285cf7', '#f7557a'],
        resize: true,
        labelColor:"#8c9fc3"
    });

});
