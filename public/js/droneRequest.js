const ERRORS =
    {
    droneTypeField: 'Select the Drone Type.',
    serviceTypeField: 'Select the Drone Service Type.',
    departmentField: 'Select your Department.',
    commentField: 'Fill in the Comment.',
    minLength: 'The length should be minimum 8 characters.',
    invalidEmail: 'This is not a valid email address.'
}

new Vue({
    el: "#droneForm",
    data: {
        droneType: '',
        droneTypeFB: '',
        serviceType: '',
        serviceTypeFB: '',
        department: '',
        departmentFB: '',
        comment: '',
        commentFB: '',
        submition: false,
        showErrors: false
    },
    computed: {
        wrongDroneType()
        {
            if(this.droneType === '') {
                this.droneTypeFB = ERRORS.droneTypeField
                return true
            }
            return false
        },
        wrongServiceType() {
            if(this.serviceType === '') {
                this.serviceTypeFB = ERRORS.serviceTypeField
                return true
            }
            return false
        },
        wrongDepartment() {
            if(this.department === '') {
                this.departmentFB = ERRORS.departmentField
                return true
            }
            return false
        },
        wrongComment() {
            if(this.comment === '') {
                this.commentFB = ERRORS.commentField
                return true
            }
            return false
        }
    },
    methods: {
        validateForm() {
            this.submition = true
            if(this.wrongDroneType || this.wrongServiceType || this.wrongDepartment || this.wrongComment)
                event.preventDefault()
        }
        },
    mounted()
        {
            axios.get('/api/v1/drone-type')
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
});