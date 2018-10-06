const MYJS = (function () {

    let token;

    function activateSideMenu(menu, submenu) {
        document.querySelectorAll('ul.page-sidebar-menu>li').forEach(function(item){
            item.classList.remove('active', 'open');
        });
        const li = document.querySelector('#' + menu);
        const submenuitem = document.querySelector('#' + submenu);
        li.classList.add('active', 'open');
        li.querySelector('a>span.arrow').classList.add('open');
        submenuitem.classList.add('active');
    };

    function setToken(token){
        this.token = token;
    }

    function getToken(){
        return this.token;
    }

    return {
        setToken: setToken,
        getToken: getToken,
        activateSideMenu: activateSideMenu
    };
})();
