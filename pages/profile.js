document.addEventListener('DOMContentLoaded', function() {
    // Get profile form elements
    // propmt
    const profileEditForm = document.getElementById('profileEditForm');
    const overlay = document.querySelector('.overlay');
    // edit context
    const editName = document.querySelector('#editName');
    const editBirthday =document.querySelector('#editBirthday');
    const editDescription = document.querySelector('#editDescription');
    //  event for turn on/off and save
    const editProfile = document.querySelector('.p_top_edit');
    const closeProfileEdit = document.getElementById('closeProfileEdit');
    const saveProfileEdit = document.getElementById('saveProfile');
    // tweet
    const deleteTweet = document.querySelectorAll('.tweet-delete');
    // ========from here for edit the profile========
    // function to show profile edit form
    function showprofileEditForm(){
        profileEditForm.style.display = 'block';
        overlay.style.display = 'block';
        editName.focus(); 

    }

    // function to hide edit form
    function hidefileEditForm(){
        profileEditForm.style.display = 'none';
        overlay.style.display = 'none';
        editName.value = '';
        editBirthday.value='';
        editDescription.value = '';
    }

    // function saveProfileForm(){
    //     // validate name
    //     const defaultMsg = '';
    //     const nameErrorMsg = 'Name needs to be less than 8 characters';
    //     const birthdayErrorMsg = 'Birthday format should day,month,year '

    //     const nameError = document.createElement('p')
    //     nameError.setAttribute('class','warning')
    //     document.querySelector("#editName").parentNode.appendChild(nameError);
        
    //     function validateName(){
    //         if (editName.value.length > 8){
    //             return nameErrorMsg;
    //         }else{
    //             return defaultMsg;
    //         }
    //     }

    //     editName.parentNode.insertBefore(nameError, editName.nextSibling);

    //     function validate(){
    //         let valid = true;
    //         let nameValidation = validateName();
    //         if(nameValidation !== defaultMsg){
    //             nameError.textContent = nameValidation;
    //             valid = false;
    //         }
    //         return valid
    //     }
    //     // event listner to empty the text inside the two paragraph when resent
    //     function reserNameError(){
    //         nameError.textContent =defaultMsg;
    //     }

    //     editName.addEventListener("blur",()=>{
    //         let x =validateName();
    //         if(x == defaultMsg){
    //             nameError.textContent = defaultMsg;
    //         }
    //     })

    //     //if validate sucessed then save
    //     // if(validate()) {
    //     //     const name = document.querySelector('.p_name');
    //     //     const birthday = document.getElementById('birthdayInfo');
    //     //     const description = document.getElementById('descriptionInfo');

    //     //     name.textContent = editName.value;
    //     //     birthday.textContent = editBirthday.value;
    //     //     description.textContent = editDescription.value;
    //     //     hidefileEditForm();
    //     // }
        
    // }
   // Event listener for turn on profile edit click
   editProfile.addEventListener('click',showprofileEditForm);
    // Event listener for turn off profile edit click
   closeProfileEdit.addEventListener('click',hidefileEditForm);
  // Event listener for save profile edit click
//    saveProfileEdit.addEventListener('click',saveProfileForm);

 // ========from here for edit Tweets========
    deleteTweet.forEach(button => {
        button.addEventListener('click', function() {
            // 删除当前推文
            const tweet = button.closest('.tweet');
            tweet.remove();
        });
    });
    


})