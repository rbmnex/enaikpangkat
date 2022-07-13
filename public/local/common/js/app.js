function getUrl(){
    let basePath = window.location.pathname.split("/");
    if(basePath[1]) {
        return window.location.origin+"/"+basePath[1];
    } else {
        return window.location.origin;
    }

}
