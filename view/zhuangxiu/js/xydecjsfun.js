




function view_loading_open2() {
    $("#div_pre_load").dialog({
        modal: true,
        height: 80,
        width: 80,
        zIndex: 999,
        resizable: false
    });

    $(".ui-dialog-titlebar").hide();
    $(".ui-widget-content").css("background", "none").css("border", "none").css("width", 80).css("height", 80);
    $(".ui-widget-overlay").css("background", "#ffffff").css("opacity", 0.8);

}

function view_loading_close2() {

    $("#div_pre_load").dialog("close");
    $("#div_pre_load").hide();


}





function view_loading_open() {
    $("#dialog-message").dialog({
        modal: true,
        height: 80,
        width: 80,
        zIndex: 999,
        resizable: false
    }); 
    
    $(".ui-dialog-titlebar").hide();
    $(".ui-widget-content").css("background", "none").css("border", "none").css("width", 80).css("height", 80);
    $(".ui-widget-overlay").css("background", "#ffffff").css("opacity", 0.8);
    
}

function view_loading_close() {
    
        $("#dialog-message").dialog("close");
        $("#dialog-message").hide();
         

    }




    function GetXydecRadWindow() {

        var oWindow = null;
        if (window.radWindow)
            oWindow = window.radWindow;
        else if (window.frameElement.radWindow)
            oWindow = window.frameElement.radWindow;
        return oWindow;

    }

    function CloseXydecRadWindow() {
        var oWindow = GetXydecRadWindow();
        oWindow.argument = null;
        oWindow.close();
        return false;
    }




    function Modify_Success() {

        alert("修改成功");
        return false;

    }

    function Modify_Error() {

        alert("修改失败，请刷新页面重试");
        return false;

    }


    function refreshParentRadGrid() {
        window.parent.RefreshRadGrid();

    }


    function home_news_on(checkid) {

        if (checkid == "news_group") {
            $("#td_news_group_title").css("color", "#a60505");
            $("#td_news_gonggao_title").css("color", "#2d2d2d");

            $("#td_news_group_image").attr("src", "/images/bg_titlebutton_red.gif");
            $("#td_news_gonggao_image").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#table_news_group").show();
            $("#table_news_gonggao").hide();


        }

        if (checkid == "news_gonggao") {
            $("#td_news_group_title").css("color", "#2d2d2d");
            $("#td_news_gonggao_title").css("color", "#a60505");

            $("#td_news_group_image").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#td_news_gonggao_image").attr("src", "/images/bg_titlebutton_red.gif");

            $("#table_news_group").hide();
            $("#table_news_gonggao").show();

        }


    }

    function news_nav_on(cs, checkid) {
        if (cs == "group") {
            if (checkid == "gonggao") {
                $("#td_nav_news_gonggao").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_gonggao").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_gonggao_letter").css("color", "White");

            }

            if (checkid == "bransh") {
                $("#td_nav_news_bransh").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_bransh").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_bransh_letter").css("color", "White");

            }

        }

        if (cs == "gonggao") {
            if (checkid == "group") {
                $("#td_nav_news_group").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_group").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_group_letter").css("color", "White");

            }

            if (checkid == "bransh") {
                $("#td_nav_news_bransh").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_bransh").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_bransh_letter").css("color", "White");

            }

        }

        if (cs == "bransh") {
            if (checkid == "group") {
                $("#td_nav_news_group").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_group").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_group_letter").css("color", "White");

            }

            if (checkid == "gonggao") {
                $("#td_nav_news_gonggao").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_nav_news_gonggao").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_nav_news_gonggao_letter").css("color", "White");

            }

        }


    }

    function news_nav_off(checkid) {

        if (checkid == "group") {
            $("#td_nav_news_group").css("background-image", "");
            $("#img_nav_news_group").attr("src", "/images/news_nav_apart.gif");
            $("#td_nav_news_group_letter").css("color", "");

        }

        if (checkid == "gonggao") {
            $("#td_nav_news_gonggao").css("background-image", "");
            $("#img_nav_news_gonggao").attr("src", "/images/news_nav_apart.gif");
            $("#td_nav_news_gonggao_letter").css("color", "");

        }

        if (checkid == "bransh") {
            $("#td_nav_news_bransh").css("background-image", "");
            $("#img_nav_news_bransh").attr("src", "/images/news_nav_apart.gif");
            $("#td_nav_news_bransh_letter").css("color", "");

        }

    }


    function news_nav_onclick(checkid) {

        if (checkid == "group") {
            location.href = "/newsGroup.aspx";

        }

        if (checkid == "gonggao") {

            location.href = "/newsAnnouncement.aspx";
        }

        if (checkid == "bransh") {

            location.href = "/newsBranches.aspx";
        }

    }


    function about_nav_onclick(checkid) {

        if (checkid == "Group") {
            location.href = "/aboutGroup.aspx";
        }

        if (checkid == "Honor") {
            location.href = "/aboutHonor.aspx";
        }

        if (checkid == "History") {
            location.href = "/aboutHistory.aspx";
        }

        if (checkid == "SocialResponsibility") {
            location.href = "/aboutSocialResponsibility.aspx";
        }

    }



    function about_nav_on(cs, checkid) {
        if (cs == "Group") {
            if (checkid == "Honor") {
                $("#td_about_Honor").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Honor").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Honor_letter").css("color", "White");

            }

            if (checkid == "History") {
                $("#td_about_History").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_History").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_History_letter").css("color", "White");

            }

            if (checkid == "SocialResponsibility") {
                $("#td_about_SocialResponsibility").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_SocialResponsibility").attr("src", "/images/news_nav_apart_grace.gif");
                $("#tb_about_SocialResponsibility_letter").css("color", "White");

            }

        }


        if (cs == "Honor") {
            if (checkid == "Group") {
                $("#td_about_Group").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Group").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Group_letter").css("color", "White");

            }

            if (checkid == "History") {
                $("#td_about_History").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_History").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_History_letter").css("color", "White");

            }

            if (checkid == "SocialResponsibility") {
                $("#td_about_SocialResponsibility").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_SocialResponsibility").attr("src", "/images/news_nav_apart_grace.gif");
                $("#tb_about_SocialResponsibility_letter").css("color", "White");

            }

        }


        if (cs == "History") {
            if (checkid == "Group") {
                $("#td_about_Group").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Group").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Group_letter").css("color", "White");

            }

            if (checkid == "Honor") {
                $("#td_about_Honor").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Honor").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Honor_letter").css("color", "White");

            }

            if (checkid == "SocialResponsibility") {
                $("#td_about_SocialResponsibility").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_SocialResponsibility").attr("src", "/images/news_nav_apart_grace.gif");
                $("#tb_about_SocialResponsibility_letter").css("color", "White");

            }

        }


        if (cs == "SocialResponsibility") {
            if (checkid == "Group") {
                $("#td_about_Group").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Group").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Group_letter").css("color", "White");

            }

            if (checkid == "Honor") {
                $("#td_about_Honor").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_Honor").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_Honor_letter").css("color", "White");

            }

            if (checkid == "History") {
                $("#td_about_History").css("background-image", "url('/images/news_nav_title_bg.gif')");
                $("#img_about_History").attr("src", "/images/news_nav_apart_grace.gif");
                $("#td_about_History_letter").css("color", "White");

            }

        }



    }

    function about_nav_off(checkid) {
        if (checkid == "Group") {
            $("#td_about_Group").css("background-image", "");
            $("#img_about_Group").attr("src", "/images/news_nav_apart.gif");
            $("#td_about_Group_letter").css("color", "");
        }

        if (checkid == "Honor") {
            $("#td_about_Honor").css("background-image", "");
            $("#img_about_Honor").attr("src", "/images/news_nav_apart.gif");
            $("#td_about_Honor_letter").css("color", "");
        }

        if (checkid == "History") {
            $("#td_about_History").css("background-image", "");
            $("#img_about_History").attr("src", "/images/news_nav_apart.gif");
            $("#td_about_History_letter").css("color", "");
        }

        if (checkid == "SocialResponsibility") {
            $("#td_about_SocialResponsibility").css("background-image", "");
            $("#img_about_SocialResponsibility").attr("src", "/images/news_nav_apart.gif");
            $("#tb_about_SocialResponsibility_letter").css("color", "");
        }



    }




    function cultural_Publicatins_on(checkid) {

        if (checkid == "2014") {
            $("#td_2014").css("color", "#a60505");
            $("#td_2013").css("color", "#2d2d2d");
            $("#td_2012").css("color", "#2d2d2d");
            $("#td_2011").css("color", "#2d2d2d");

            $("#img_2014").attr("src", "/images/bg_titlebuttom.gif");
            $("#img_2013").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2012").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2011").attr("src", "/images/bg_titlebutton_grace.gif")

            $("#table_2014").show();
            $("#table_2013").hide();
            $("#table_2012").hide();
            $("#table_2011").hide();


        }


        if (checkid == "2013") {
            $("#td_2014").css("color", "#2d2d2d");
            $("#td_2013").css("color", "#a60505");
            $("#td_2012").css("color", "#2d2d2d");
            $("#td_2011").css("color", "#2d2d2d");

            $("#img_2014").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2013").attr("src", "/images/bg_titlebuttom.gif");
            $("#img_2012").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2011").attr("src", "/images/bg_titlebutton_grace.gif")

            $("#table_2014").hide();
            $("#table_2013").show();
            $("#table_2012").hide();
            $("#table_2011").hide();


        }

        if (checkid == "2012") {
            $("#td_2014").css("color", "#2d2d2d");
            $("#td_2013").css("color", "#2d2d2d");
            $("#td_2012").css("color", "#a60505");
            $("#td_2011").css("color", "#2d2d2d");

            $("#img_2014").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2013").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2012").attr("src", "/images/bg_titlebuttom.gif");
            $("#img_2011").attr("src", "/images/bg_titlebutton_grace.gif")

            $("#table_2014").hide();
            $("#table_2013").hide();
            $("#table_2012").show();
            $("#table_2011").hide();


        }

        if (checkid == "2011") {
            $("#td_2014").css("color", "#2d2d2d");
            $("#td_2013").css("color", "#2d2d2d");
            $("#td_2012").css("color", "#2d2d2d");
            $("#td_2011").css("color", "#a60505");

            $("#img_2014").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2013").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2012").attr("src", "/images/bg_titlebutton_grace.gif");
            $("#img_2011").attr("src", "/images/bg_titlebuttom.gif");

            $("#table_2014").hide();
            $("#table_2013").hide();
            $("#table_2012").hide();
            $("#table_2011").show();


        }


    }






    function getQueryStringByName(name) {
        var result = location.search.match(new RegExp("[\?\&]" + name + "=([^\&]+)", "i"));
        if (result == null || result.length < 1) {
            return "";
        }
        return result[1];
    } 





                                        