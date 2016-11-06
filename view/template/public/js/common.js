/*加入收藏夹*/
function addfavorite(url, title) {
	try {
		window.external.addfavorite(url, title);
	} catch (e) {
		try {
			window.sidebar.addPanel(title, url, "");
		} catch (e) {
			alert("加入收藏失败，请使用ctrl+d进行添加");
		}
	}
}

/*设为首页*/
function sethome(obj, vrl) {
	try {
		obj.style.behavior = 'url(#default#homepage)';
		obj.setHomePage(vrl);
	} catch (e) {
		if (window.netscape) {
			try {
				netscape.security.PrivilegeManager
						.enablePrivilege("UniversalXPConnect");
			} catch (e) {
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
			}
			var prefs = Components.classes['@mozilla.org/preferences-service;1']
					.getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage', vrl);
		}
	}
}

function mailcheck(ver)
{
 var wm = document.form_wm;

 if( document.form_wm.usr.value == "" )
 {
 alert( "用户名不能为空！\r\r请重新填写！" );
 document.form_wm.usr.focus();
 return false;
 }
 if( document.form_wm.domain.value == "" )
 {
 alert( "域名不能为空！\r\r请重新填写！" );
 document.form_wm.domain.focus();
 return false;
 }
 if( document.form_wm.pass.value == "" )
 {
 alert( "密码不能为空！\r\r请重新填写！" );
 document.form_wm.pass.focus();
 return false;
 }

 userdata.setVals( [wm.usr.value,wm.domain.value], wm.remUser.checked?true:false );
 userdata.store();
 if (ver == 0)
 wm.action = "http://www.263xmail.com/xmweb";
 else
 wm.action = "http://smail2.263xmail.com/xmweb";
} 