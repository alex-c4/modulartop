var GLOBAL_URL = "";
var GLOBAL_ROUTE_URL = "";
var allProjects;
const itemsPerPage = 4;
let currentPage = 1;

// var fillProjects = function(projects){
//     var _html = '';
//     for (let i = 0; i < projects.length; i++) {
//         _html +=    '<div class="card m-3" style="border: none">' +
//                         '<div class="row no-gutters">' +
//                             '<div class="col-md-4">' +
//                                 '<img src="' + GLOBAL_URL + '/' + projects[i].cover_photo + '" alt="' + projects[i].cover_photo_alt_text + '">' +
//                             '</div>'+
//                             '<div class="col-8 d-flex flex-column justify-content-between pl-2">' +
//                                 '<div>' +
//                                     '<div class="card-gallery-title">' + projects[i].project_name + '</div>' +
//                                     '<div class="card-gallery-subtitle">Un proyecto con estilo</div>' +
//                                 '</div>' +
//                                 '<p class="card-text">' + projects[i].project_description + '</p>' +
//                                 '<div>' +
//                                     '<a class="btn btn-dark" href="' + GLOBAL_ROUTE_URL + '/' + projects[i].projectId + '" role="button">ver más</a>' +
//                                 '</div>' +
//                             '</div>' +
//                         '</div>' +
//                     '</div>';
//     }

//     $(".gallery").html(_html);

//     // console.log(allProjects);
// }

var getItemsForPage = function(page) {
    const startIndex = (page - 1) * itemsPerPage;
    return allProjects.slice(startIndex, startIndex + itemsPerPage);
}
var updateUI = function(page) {
    const items = getItemsForPage(page);
    var _html = '';
    if(page == 1) {
        document.querySelector('#btnArrowLeft').hidden = true;
        document.querySelector('#btnArrowLeftDisabled').hidden = false;
        document.querySelector('#btnArrowRightDisabled').hidden = true;
    }

    // const itemsContainer = document.getElementById('items-container');
    // itemsContainer.innerHTML = ''; // Limpiamos el contenedor antes de agregar los nuevos elementos
    items.forEach(item => {
        _html +=    '<div class="card m-3" style="border: none">' +
                        '<div class="row no-gutters">' +
                            '<div class="col-md-4">' +
                                '<img src="' + GLOBAL_URL + '/' + item.cover_photo + '" alt="' + item.cover_photo_alt_text + '">' +
                            '</div>'+
                            '<div class="col-8 d-flex flex-column justify-content-between pl-2">' +
                                '<div>' +
                                    '<div class="card-gallery-title">' + item.project_name + '</div>' +
                                    '<div class="card-gallery-subtitle">Un proyecto con estilo</div>' +
                                '</div>' +
                                '<p class="card-text">' + item.project_description + '</p>' +
                                '<div>' +
                                    '<a class="btn btn-dark" href="' + GLOBAL_ROUTE_URL + '/' + item.projectId + '" role="button">ver más</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
    });
    $(".gallery").html(_html);
}

$("#btnArrowLeft").on("click", function(){
    if(currentPage > 1){
        currentPage = currentPage - 1;
        updateUI(currentPage);
        document.querySelector('#btnArrowRight').hidden = false;
        document.querySelector('#btnArrowRightDisabled').hidden = true;
    }else{
        document.querySelector('#btnArrowLeft').hidden = true;
        document.querySelector('#btnArrowLeftDisabled').hidden = false;
    }
    

})

$("#btnArrowRight").on("click", function(){
    const pagesMax = (allProjects.length / itemsPerPage);

    if(currentPage < pagesMax){
        document.querySelector('#btnArrowLeft').hidden = false;
        document.querySelector('#btnArrowLeftDisabled').hidden = true;

        currentPage = currentPage + 1;
        updateUI(currentPage);
        if(currentPage >= pagesMax) {
            document.querySelector('#btnArrowRight').hidden = true;
            document.querySelector('#btnArrowRightDisabled').hidden = false;
        }
    }

})

