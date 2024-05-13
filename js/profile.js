document.addEventListener('DOMContentLoaded', function() {

    var addAllergens = document.getElementById('addAllergens');
    var showAllergens = document.getElementById('allergenDropdown');
    addAllergens.addEventListener('click',function(){
        showAllergens.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });
    var closeAllergens = document.getElementById('closeAllergens');
    closeAllergens.addEventListener('click', function () {
        showAllergens.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
    });
    var picUpdatDiv = document.getElementById('picUpload');
    var updatePic = document.getElementById('profile-photo');
    updatePic.addEventListener('dblclick', function () {
        picUpdatDiv.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });
    var closePic = document.getElementById('closePic');
    closePic.addEventListener('click', function () {
        picUpdatDiv.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
    });
});