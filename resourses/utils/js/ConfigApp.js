

export const HOST_NAME = `${window.location.protocol}//${window.location.host}`;
    
export const MENU_LIST = [
   {
       "name" : "Home",
       "icon" : "home-outline",
       "url" : HOST_NAME + '/ProyectoElectiva/resourses/home' 
   },
   {
       "name" : "Laboratorio",
       "icon" : "flask-outline",
       "url" : HOST_NAME + '/ProyectoElectiva/resourses/cruds/lab' 
   },
   {
       "name" : "CDC",
       "icon" : "clipboard-outline",
       "url"  : HOST_NAME + '/ProyectoElectiva/resourses/cruds/cdc' 
    },
    {
        "name" : "Ensayos",
        "icon" : "newspaper-outline",
        "url"  : HOST_NAME + '/ProyectoElectiva/resourses/cruds/essays' 
    },
    {
        "name" : "Requisitos",
        "icon" : "options-outline",
        "url"  : HOST_NAME + '/ProyectoElectiva/resourses/cruds/rules' 
    },
    {
        "name" : "Usuarios",
        "icon" : "person-circle-outline",
        "url"  : HOST_NAME + '/ProyectoElectiva/resourses/cruds/users/' 
    },

];