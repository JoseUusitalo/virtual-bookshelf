/**
 * Created with webprojekti.
 * User: ME-varjoil
 * Date: 2015-12-11
 * Time: 01:42 PM
 * To change this template use Tools | Templates.
 * CommentID, PostDate, UserID, Text
 */
var comments_json, sessionStorage, document;

function createCommentList() {
    "use strict";
    var comments;
    // Is the global json array not undefined?
    if('undefined' !== typeof comments_json) {
        // Copy the data to the local variable.
        comments = comments_json;
    } else {
        // Get the data from sessionStorage.
        comments = JSON.parse(sessionStorage.getItem('comments_json'));
        // Remove the item from storage as it is no longer needed.
        sessionStorage.removeItem('users_json');
    }
    var commenttitle = document.createElement("h3");
    commenttitle.innerHTML = "Comments";
    document.getElementById("commentlist").appendChild(commenttitle);
    var comment, usera, infodiv, maindiv, datediv, userdiv, commentdiv;
    for(comment in comments) {
        usera = document.createElement("a");
        userdiv = document.createElement("div");
        infodiv = document.createElement("div");
        maindiv = document.createElement("div");
        maindiv.className = "row";
        commentdiv = document.createElement("div");
        datediv = document.createElement("div");
        usera.href = "./useview/" + comments[comment].user_id;
        usera.innerHTML = comments[comment].ScreenName;
        userdiv.className = "col-md-4";
        userdiv.appendChild(usera);
        infodiv.className = "row";
        infodiv.appendChild(userdiv);
        datediv.innerHTML = comments[comment].PostDate;
        datediv.className = "col-md-2 ";
        infodiv.appendChild(datediv);
        maindiv.appendChild(infodiv);
        commentdiv.innerHTML = comments[comment].Text;
        commentdiv.className = "col-md-12";
        maindiv.appendChild(commentdiv);
        document.getElementById("commentlist").appendChild(maindiv);
    }
}