//const ERRORS =
  //  {

       // commentField: 'Fill in the Comment.',
     //   rejectReasonField:'Select Reject Reason',
     //   minLength: 'The length should be minimum 8 characters.',
      //  invalidEmail: 'This is not a valid email address.'
    //}

//new Vue({
  //   el: "#droneForm",
  //   data: {
       //  comment: '',
        // commentFB: '',
       //  approve:'',
       //  rejectReasonFB: '',
         // firstOption: [],
         //secondOption: [],
         // submition: false,
         // showErrors: false,


 //}});
new Vue(
    {
           el:'#droneForm',
            data:
                {

                    approveFB:'',
                    rejectFB:'',
                    comment:'drone is not available',
                    rejectReason:'',
                    FirstApprove:''
                }
            }
),

   methods:
   {
    approved()
       {
           this.FirstApprove=true;
       }

    },
components:

    {


    };

