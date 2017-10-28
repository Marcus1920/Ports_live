const ERRORS =
    {
        approveFBField: 'Please Click.',
        rejectFBField: '',
        caseStatus:'change the status',
        commentField:'Fill in the comment'

    }


new Vue({
        el:'#droneApproval',
        data:
            {

                approveFB:'',
                rejectFB:'',
                rejectReasonFB:'',
                caseStatus:'',
                comment:'drone is not available',
                submition:false,
                showErrors:false

            },

    mounted:function() {
        // axios.get('api/v1/drone-type')
        //     .then(function (response) {
        //         console.log(response.data);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        // axios.get('drone-sub-type')
        //     .then(function (response) {
        //         console.lo(response.data);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        axios.get('api/v1/drone/1')
            .then(function (response) {
                console.log(response.data);
            })
        .catch(function(error)
        {
            console.log(error)
        })

        // axios.get('/api/v1/firstDroneApproval')
        //     .then(function (response) {
        //         console.log(response.data);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });

        axios.get('/api/v1/userDepartment')
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });

        // axios.get('api/v1/rejectDroneRequest/5')
        //     .then(function (response) {
        //         console.log(response.data);
        //     });
        // axios.get('')
        //     .then(function (error) {
        //         console.log(response.data);
        //     });
    }


})

