const ERRORS =
    {
        droneTypeField: 'Select the Drone Type.',
        serviceTypeField: 'Select the Drone Service Type.',
        departmentField: 'Select your Department.',
        commentField: 'Fill in the Comment.',
        createdByField: 'Fill in the Comment.',
        minLength: 'The length should be] minimum 8 characters.',
        invalidEmail: 'This is not a valid email address.'
}

var drones = new Vue({
        el: "#droneForm",
        data: function () {
            return {
                department: '',
                departmentFB: '',
                drone_type_id: '',
                droneTypeFB: '',
                sub_drone_type_id: '',
                serviceTypeFB: '',
                comment: '',
                commentFB: '',
                submition: false,
                showErrors: false,
                loading: false,
                error: false,
                departments: [],
                droneTypeData: [],
                serviceTypeData: []
            };
        },
        computed: {
            wrongDepartment: function () {
                if (this.department === '') {
                    this.departmentFB = ERRORS.departmentField;
                    return true
                }
                return false
            },

            wrongDroneType: function () {
                if (this.drone_type_id === '') {
                    this.droneTypeFB = ERRORS.droneTypeField;
                    return true
                }
                return false
            },
            wrongServiceType: function () {
                if (this.sub_drone_type_id === '') {
                    this.serviceTypeFB = ERRORS.serviceTypeField;
                    return true
                }
                return false
            },
            wrongComment: function () {
                if (this.comment === '') {
                    this.commentFB = ERRORS.commentField;
                    return true
                }
                return false
            }

        },
<<<<<<< HEAD
     mounted()
        {

            axios.get('/api/v1/drone-type')
                .then(function(response)
                {
                    console.log(response.data);
                })
            axios.get('/api/v1/drone-type')
                .then(response => this.firstOption = response.data);
                // .then(function (response) {
                    
                //     console.log(response.data);
                // })
                // .catch(function (error) {
                //     console.log(error);
                // });

            // this.$http.get("/api/camps",function(camps){
            //     this.$set('camps',camps);
            //     this.$emit('data-loaded');
            // });

            axios.get('/api/v1/drone-sub-type')
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
=======
        methods: {
            validateForm: function () {
                this.submition = true;
                if (this.wrongDepartment || this.wrongDroneType || this.wrongServiceType || this.wrongComment) {
                    event.preventDefault()
                } else {
                    axios.post('/api/v1/drone')
                        .then(function (response) {
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            updateDroneType: function (value) {
                if (value !== '') {
                    this.serviceTypeData = [];
                    axios.get('/api/v1/droneSubType/' + value)
                        .then(function (response) {
                            $.each(response.data, function (key, value) {
                                this.serviceTypeData.push(value);
                            }.bind(this));
                            return this.serviceTypeData;
                        }.bind(this))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }
>>>>>>> 57f936e58f2d817fb8c479a924263e5758f7a7aa

        }
    });

$(document).ready(function () {
    $("#departmentId").tokenInput("/api/v1/userDepartment", {tokenLimit: 1});
});
