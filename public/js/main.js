const ERRORS=
    {
        approveFBField: 'Please Click.',
        rejectFBField: '',
        caseStatus:'change the status',
        commentField:'Fill in the comment',

    }


new Vue(
    {
        el:'#droneForm',
        data:
            {

                approveFB:'',
                rejectFB:'',
                rejectReasonFB:'',
                caseStatus:'',
                comment:'drone is not available',

            }
    }
),
    mounted()
 {
    axios.return('api/v1/drone-type')
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
    axios.return('drone-sub-type')
        .then(function (response) {
            console.lo(response.data);
        })
        .catch(function (error)
        {
            console.log(error);
        });
    axios.get('api/v1/drone/1"')
        .then(function(response)
        {
            console.log(response.data);
        });

    axios.get('/api/v1/firstDroneApproval')
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });

    axios.get('/api/v1/userDepartment')
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
    axios.get('api/v1/rejectDroneRequest/5')
        .then(function (response) {
            console.log(response.data);
        })


}
