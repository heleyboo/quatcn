
var Paginator = function(paginatorElement, config){
    this.paginatorElement = paginatorElement;
    this.config = {
    currentPage: config.currentPage,
    rowsPerPage: config.rowsPerPage,
    maxRowsPerPage: config.maxRowsPerPage,
    totalPages: Math.ceil(config.totalRows/config.rowsPerPage),
    totalRows: config.totalRows,
    visiblePageLinks: config.visiblePageLinks,

    showGoToPage: true,
    showRowsPerPage: true,
    showRowsInfo: true,
    showRowsDefaultInfo: true,

    directURL: false, // or a function with current page as argument
    disableTextSelectionInNavPane: true, // disable text selection and double click

    bootstrap_version: "3",

    // bootstrap 3
    containerClass: "well",

    mainWrapperClass: "row",

    navListContainerClass: "col-xs-12 col-sm-12 col-md-6",
    navListWrapperClass: "",
    navListClass: "pagination pagination_custom",
    navListActiveItemClass: "active",

    navGoToPageContainerClass: "col-xs-6 col-sm-4 col-md-2 row-space",
    navGoToPageIconClass: "glyphicon glyphicon-arrow-right",
    navGoToPageClass: "form-control small-input",

    navRowsPerPageContainerClass: "col-xs-6 col-sm-4 col-md-2 row-space",
    navRowsPerPageIconClass: "glyphicon glyphicon-th-list",
    navRowsPerPageClass: "form-control small-input",

    navInfoContainerClass: "col-xs-12 col-sm-4 col-md-2 row-space",
    navInfoClass: "",

    // element IDs
    nav_list_id_prefix: "nav_list_",
    nav_top_id_prefix: "top_",
    nav_prev_id_prefix: "prev_",
    nav_item_id_prefix: "nav_item_",
    nav_next_id_prefix: "next_",
    nav_last_id_prefix: "last_",

    nav_goto_page_id_prefix: "goto_page_",
    nav_rows_per_page_id_prefix: "rows_per_page_",
    nav_rows_info_id_prefix: "rows_info_",

    onChangePage: function(event, data){
        config.onChangePage(event, data);
    },
    onLoad: function(event, data){
        config.onLoad(data);
    }
};

    
};
Paginator.prototype.showPaginator = function(){
    $(this.paginatorElement).bs_pagination(this.config);
};


