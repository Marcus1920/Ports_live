const ERRORS =
    {
    droneTypeField: 'Select the Drone Type.',
    serviceTypeField: 'Select the Drone Service Type.',
    departmentField: 'Select your Department.',
    commentField: 'Fill in the Comment.',
    minLength: 'The length should be] minimum 8 characters.',
    invalidEmail: 'This is not a valid email address.'
}

 var drones = new Vue({
    el: "#droneForm",
    data:  function()
    {
        return{
            droneType: '',
            droneTypeFB: '',
            serviceType: '',
            serviceTypeFB: '',
            department: '',
            departmentFB: '',
            comment: '',
            commentFB: '',
            submition: false,
            showErrors: false,
            firstOption: [],
            secondOption: []
        };
    },

    computed: {
        wrongDroneType: function()
        {
            if(this.droneType === '') {
                this.droneTypeFB = ERRORS.droneTypeField;
                return true
            }
            return false
        },
        wrongServiceType: function() {
            if(this.serviceType === '') {
                this.serviceTypeFB = ERRORS.serviceTypeField;
                return true
            }
            return false
        },
        wrongDepartment : function(){
            if(this.department === '') {
                this.departmentFB = ERRORS.departmentField;
                return true
            }
            return false
        },
        wrongComment: function() {
            if(this.comment === '') {
                this.commentFB = ERRORS.commentField;
                return true
            }
            return false
        }
    },
    methods: {

        validateForm :function(){
            this.submition = true;
            if(this.wrongDroneType || this.wrongServiceType || this.wrongDepartment || this.wrongComment)
                event.preventDefault()
        },

        updateDroneType : function(value)
           {
               if (value !== '')
               {
                   this.secondOption = [];
                   axios.get('/api/v1/droneSubType/' + value)
                       .then(function (response)
                       {
                           //$.each(response.data, function(key, value) {
                            this.secondOption.push(response.data);
                          // }.bind(this));
                           return this.secondOption;
                       }.bind(this))
                           .catch(function (error)
                           {
                               console.log(error);
                           });
               }
           }
        },
     mounted()
        {
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

        }
});