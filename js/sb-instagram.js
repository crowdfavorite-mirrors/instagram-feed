(function($){ 

	(function(){var e,t;e=function(){function e(e,t){var n,r;this.options={target:"instafeed",get:"popular",resolution:"thumbnail",sortBy:"none",links:!0,mock:!1,useHttp:!1};if(typeof e=="object")for(n in e)r=e[n],this.options[n]=r;this.context=t!=null?t:this,this.unique=this._genKey()}return e.prototype.hasNext=function(){return typeof this.context.nextUrl=="string"&&this.context.nextUrl.length>0},e.prototype.next=function(){return this.hasNext()?this.run(this.context.nextUrl):!1},e.prototype.run=function(t){var n,r,i;if(typeof this.options.clientId!="string"&&typeof this.options.accessToken!="string")throw new Error("Missing clientId or accessToken.");if(typeof this.options.accessToken!="string"&&typeof this.options.clientId!="string")throw new Error("Missing clientId or accessToken.");return this.options.before!=null&&typeof this.options.before=="function"&&this.options.before.call(this),typeof document!="undefined"&&document!==null&&(i=document.createElement("script"),i.id="instafeed-fetcher",i.src=t||this._buildUrl(),n=document.getElementsByTagName("head"),n[0].appendChild(i),r="instafeedCache"+this.unique,window[r]=new e(this.options,this),window[r].unique=this.unique),!0},e.prototype.parse=function(e){var t,n,r,i,s,o,u,a,f,l,c,h,p,d,v,m,g,y,b,w,E,S;if(typeof e!="object"){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"Invalid JSON data"),!1;throw new Error("Invalid JSON response")}if(e.meta.code!==200){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,e.meta.error_message),!1;throw new Error("Error from Instagram: "+e.meta.error_message)}if(e.data.length===0){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"No images were returned from Instagram"),!1;throw new Error("No images were returned from Instagram")}this.options.success!=null&&typeof this.options.success=="function"&&this.options.success.call(this,e),this.context.nextUrl="",e.pagination!=null&&(this.context.nextUrl=e.pagination.next_url);if(this.options.sortBy!=="none"){this.options.sortBy==="random"?d=["","random"]:d=this.options.sortBy.split("-"),p=d[0]==="least"?!0:!1;switch(d[1]){case"random":e.data.sort(function(){return.5-Math.random()});break;case"recent":e.data=this._sortBy(e.data,"created_time",p);break;case"liked":e.data=this._sortBy(e.data,"likes.count",p);break;case"commented":e.data=this._sortBy(e.data,"comments.count",p);break;default:throw new Error("Invalid option for sortBy: '"+this.options.sortBy+"'.")}}if(typeof document!="undefined"&&document!==null&&this.options.mock===!1){a=e.data,this.options.limit!=null&&a.length>this.options.limit&&(a=a.slice(0,this.options.limit+1||9e9)),n=document.createDocumentFragment(),this.options.filter!=null&&typeof this.options.filter=="function"&&(a=this._filter(a,this.options.filter));if(this.options.template!=null&&typeof this.options.template=="string"){i="",o="",l="",v=document.createElement("div");for(m=0,b=a.length;m<b;m++)s=a[m],u=s.images[this.options.resolution].url,this.options.useHttp||(u=u.replace("http://","//")),o=this._makeTemplate(this.options.template,{model:s,id:s.id,link:s.link,image:u,caption:this._getObjectProperty(s,"caption.text"),likes:s.likes.count,comments:s.comments.count,location:this._getObjectProperty(s,"location.name")}),i+=o;v.innerHTML=i,S=[].slice.call(v.childNodes);for(g=0,w=S.length;g<w;g++)h=S[g],n.appendChild(h)}else for(y=0,E=a.length;y<E;y++)s=a[y],f=document.createElement("img"),u=s.images[this.options.resolution].url,this.options.useHttp||(u=u.replace("http://","//")),f.src=u,this.options.links===!0?(t=document.createElement("a"),t.href=s.link,t.appendChild(f),n.appendChild(t)):n.appendChild(f);this.options.target.append(n),r=document.getElementsByTagName("head")[0],r.removeChild(document.getElementById("instafeed-fetcher")),c="instafeedCache"+this.unique,window[c]=void 0;try{delete window[c]}catch(x){}}return this.options.after!=null&&typeof this.options.after=="function"&&this.options.after.call(this),!0},e.prototype._buildUrl=function(){var e,t,n;e="https://api.instagram.com/v1";switch(this.options.get){case"popular":t="media/popular";break;case"tagged":if(typeof this.options.tagName!="string")throw new Error("No tag name specified. Use the 'tagName' option.");t="tags/"+this.options.tagName+"/media/recent";break;case"location":if(typeof this.options.locationId!="number")throw new Error("No location specified. Use the 'locationId' option.");t="locations/"+this.options.locationId+"/media/recent";break;case"user":if(typeof this.options.userId!="number")throw new Error("No user specified. Use the 'userId' option.");if(typeof this.options.accessToken!="string")throw new Error("No access token. Use the 'accessToken' option.");t="users/"+this.options.userId+"/media/recent";break;default:throw new Error("Invalid option for get: '"+this.options.get+"'.")}return n=""+e+"/"+t,this.options.accessToken!=null?n+="?access_token="+this.options.accessToken:n+="?client_id="+this.options.clientId,this.options.limit!=null&&(n+="&count="+this.options.limit),n+="&callback=instafeedCache"+this.unique+".parse",n},e.prototype._genKey=function(){var e;return e=function(){return((1+Math.random())*65536|0).toString(16).substring(1)},""+e()+e()+e()+e()},e.prototype._makeTemplate=function(e,t){var n,r,i,s,o;r=/(?:\{{2})([\w\[\]\.]+)(?:\}{2})/,n=e;while(r.test(n))i=n.match(r)[1],s=(o=this._getObjectProperty(t,i))!=null?o:"",n=n.replace(r,""+s);return n},e.prototype._getObjectProperty=function(e,t){var n,r;t=t.replace(/\[(\w+)\]/g,".$1"),r=t.split(".");while(r.length){n=r.shift();if(!(e!=null&&n in e))return null;e=e[n]}return e},e.prototype._sortBy=function(e,t,n){var r;return r=function(e,r){var i,s;return i=this._getObjectProperty(e,t),s=this._getObjectProperty(r,t),n?i>s?1:-1:i<s?1:-1},e.sort(r.bind(this)),e},e.prototype._filter=function(e,t){var n,r,i,s,o;n=[],i=function(e){if(t(e))return n.push(e)};for(s=0,o=e.length;s<o;s++)r=e[s],i(r);return n},e}(),t=typeof exports!="undefined"&&exports!==null?exports:window,t.instagramfeed=e}).call(this);

	//Shim for "fixing" IE's lack of support (IE < 9) for applying slice on host objects like NamedNodeMap, NodeList, and HTMLCollection) https://github.com/stevenschobert/instafeed.js/issues/84
	(function(){"use strict";var e=Array.prototype.slice;try{e.call(document.documentElement)}catch(t){Array.prototype.slice=function(t,n){n=typeof n!=="undefined"?n:this.length;if(Object.prototype.toString.call(this)==="[object Array]"){return e.call(this,t,n)}var r,i=[],s,o=this.length;var u=t||0;u=u>=0?u:o+u;var a=n?n:o;if(n<0){a=o+n}s=a-u;if(s>0){i=new Array(s);if(this.charAt){for(r=0;r<s;r++){i[r]=this.charAt(u+r)}}else{for(r=0;r<s;r++){i[r]=this[u+r]}}}return i}}})()

	//IE8 also doesn't offer the .bind() method triggered by the 'sortBy' property. Copy and paste the polyfill offered here:
	if(!Function.prototype.bind){Function.prototype.bind=function(e){if(typeof this!=="function"){throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable")}var t=Array.prototype.slice.call(arguments,1),n=this,r=function(){},i=function(){return n.apply(this instanceof r&&e?this:e,t.concat(Array.prototype.slice.call(arguments)))};r.prototype=this.prototype;i.prototype=new r;return i}}


})(jQuery);


function sbi_init(){

    jQuery('#sb_instagram.sbi').each(function(){

        var $self = jQuery(this),
            $target = $self.find('#sbi_images'),
            $loadBtn = $self.find("#sbi_load .sbi_load_btn"),
            imgRes = 'standard_resolution',
            cols = parseInt( this.getAttribute('data-cols') ),
            num = this.getAttribute('data-num'),
            //Convert styles JSON string to an object
            feedOptions = JSON.parse( this.getAttribute('data-options') ),
            getType = 'user',
            sortby = 'none',
            user_id = this.getAttribute('data-id'),
            num = this.getAttribute('data-num'),
            posts_arr = [],
            $header = '',
            morePosts = []; //Used to determine whether to show the Load More button when displaying posts from more than one id/hashtag. If one of the ids/hashtags has more posts then still show button.

        if( feedOptions.sortby !== '' ) sortby = feedOptions.sortby;

        switch( this.getAttribute('data-res') ) {
            case 'auto':
                var feedWidth = jQuery('#sb_instagram').innerWidth(),
                    colWidth = jQuery('#sb_instagram').innerWidth() / cols;

                if( feedWidth < 680 ) colWidth = 300; //Use 306x306 images
                if( feedWidth < 480 && feedWidth > 300 ) colWidth = 480; //Use full size images

                if( colWidth < 150 ){
                    imgRes = 'thumbnail';
                } else if( colWidth < 306 ){
                    imgRes = 'low_resolution';
                } else {
                    imgRes = 'standard_resolution';
                }

                break;
            case 'thumb':
                imgRes = 'thumbnail';
                break;
            case 'medium':
                imgRes = 'low_resolution';
                break;
            default:
                imgRes = 'standard_resolution';
        }

        //Split comma separated hashtags into array
        var ids_arr = user_id.replace(/ /g,'').split(",");
        var looparray = ids_arr;

        //Get page info for first User ID
        var headerStyles = '',
            sbi_page_url = 'https://api.instagram.com/v1/users/' + ids_arr[0] + '?access_token=' + sb_instagram_js_options.sb_instagram_at;

        if(feedOptions.headercolor.length) headerStyles = 'style="color: #'+feedOptions.headercolor+'"';

        jQuery.ajax({
            method: "GET",
            url: sbi_page_url,
            dataType: "jsonp",
            success: function(data) {
                $header = '<a href="http://instagram.com/'+data.data.username+'" target="_blank" title="@'+data.data.username+'" class="sbi_header_link" '+headerStyles+'>';
                $header += '<div class="sbi_header_text">';
                $header += '<h3'
                if( data.data.bio.length == 0 ) $header += ' class="sbi_no_bio"';
                $header += '>@'+data.data.username+'</h3>';
                if( data.data.bio.length ) $header += '<p class="sbi_bio">'+data.data.bio+'</p>';
                $header += '</div>';
                $header += '<div class="sbi_header_img">';
                $header += '<div class="sbi_header_img_hover"><i class="fa fa-instagram"></i></div>';
                $header += '<img src="'+data.data.profile_picture+'" alt="'+data.data.full_name+'" width="50" height="50">';
                $header += '</div>';
                $header += '</a>';
                //Add the header
                $self.find('.sb_instagram_header').prepend( $header );
                //Change the URL of the follow button
                if( $self.find('.sbi_follow_btn').length ) $self.find('.sbi_follow_btn a').attr('href', 'http://instagram.com/' + data.data.username )
            }
        });

        //Loop through User IDs
        // looparray.forEach(function(entry) {
        jQuery.each( looparray, function( index, entry ) {

            var userFeed = new instagramfeed({
                target: $target,
                get: getType,
                sortBy: sortby,
                resolution: imgRes,
                limit: parseInt( num ),
                template: '<div class="sbi_item sbi_type_{{model.type}} sbi_new" id="sbi_{{id}}" data-date="{{model.created_time_raw}}"><div class="sbi_photo_wrap"><a class="sbi_photo" href="{{link}}" target="_blank"><img src="{{image}}" alt="{{image}}" /></a></div></div>',
                filter: function(image) {
                    //Create time for sorting
                    var date = new Date(image.created_time*1000),
                        time = date.getTime();
                    image.created_time_raw = time;

                    return true;
                },
                userId: parseInt( entry ),
                accessToken: sb_instagram_js_options.sb_instagram_at,
                after: function() {

                    $self.find('.sbi_loader').remove();

                    /* Load more button */
                    if (this.hasNext()) morePosts.push('1');

                    if(morePosts.length > 0){
                        $loadBtn.show();
                    } else {
                        $loadBtn.hide();
                        $self.css('padding-bottom', 0);
                    }

                    // Call Custom JS if it exists
                    if (typeof sbi_custom_js == 'function') sbi_custom_js();

                    //Fade photos on hover
                    jQuery('#sb_instagram .sbi_photo').each(function(){
                        jQuery(this).hover(function(){
                            jQuery(this).fadeTo(200, 0.85);
                        }, function(){
                            jQuery(this).stop().fadeTo(500, 1);
                        });
                    });


                    //Sort posts by date
                    //only sort the new posts that are loaded in, not the whole feed, otherwise some photos will switch positions due to dates
                    $self.find('#sbi_images .sbi_item.sbi_new').sort(function (a, b) {
                        var aComp = jQuery(a).attr("data-date"),
                            bComp = jQuery(b).attr("data-date");

                        if(sortby == 'none'){
                            //Order by date
                            return bComp - aComp;
                        } else {
                            //Randomize
                            return (Math.round(Math.random())-0.5);
                        }

                    }).appendTo( $self.find("#sbi_images") );

                    //Remove the new class after 500ms, once the sorting is done
                    setTimeout(function(){
                        jQuery('#sbi_images .sbi_item.sbi_new').removeClass('sbi_new');
                        //Reset the morePosts variable so we can check whether there are more posts every time the Load More button is clicked
                        morePosts = [];
                    }, 500);

                    //Header profile pic hover
                    $self.find('.sb_instagram_header a').hover(function(){
                        $self.find('.sb_instagram_header .sbi_header_img_hover').fadeIn(200);
                    }, function(){
                        $self.find('.sb_instagram_header .sbi_header_img_hover').stop().fadeOut(600);
                    });


                }, // End 'after' function
                error: function(data) {
                    var sbiErrorMsg = '',
                        sbiErrorDir = '';

                    if( data.indexOf('access_token') > -1 ){
                        sbiErrorMsg += '<p><b>Error: Access Token is not valid</b><br /><span>This error message is only visible to WordPress admins</span>';
                        sbiErrorDir = "<p>There's an issue with the Instagram Access Token that you are using. Please obtain a new Access Token on the plugin's Settings page.";
                    } else if( data.indexOf('user does not exist') > -1 ){
                        sbiErrorMsg += '<p><b>Error: The User ID does not exist</b><br /><span>This error is only visible to WordPress admins</span>';
                        sbiErrorDir = "<p>Please double check the Instagram User ID that you are using. To find your User ID simply enter your Instagram user name into this <a href='http://www.otzberg.net/iguserid/' target='_blank'>tool</a>.</p>";
                    }

                    //Add the error message to the page unless the user is displaying multiple ids or hashtags
                    if(looparray.length < 2) jQuery('#sb_instagram').empty().append( '<p style="text-align: center;">Unable to show Instagram photos</p><div id="sbi_mod_error">' + sbiErrorMsg + sbiErrorDir + '</div>');
                }
            });

            $loadBtn.click(function() {
                userFeed.next();
            });

            userFeed.run();

        }); //End User ID array loop

    
    });

}
sbi_init();