/**
 * This file gets all Feature Me widgets on page and binds actions to the element ID's.
 */
jQuery(document).ready(function($){
    //Gather all the Feature Me Widgets on the page
     var fm = $('.widget:contains("feature_me")');

     //Remove the first element found since the ID hasn't been set yet.
     if(fm.length > 1){
     fm.splice(0,1);
     }
     else{
     //do nothing because there are no active feature me widgets
     }


     //Variable to hold the ID's of the elements on the page.
     var fm_ids = new Array(); //set up array to hold the ID's

     for(var i = 0; i < fm.length; i++){
     fm_ids[i] = fm.eq(i).attr('id');
     }
     //console.log('fm_ids: '+fm_ids);
     for(var i = 0; i<fm_ids.length; i++){
     fm_ids[i] = fm_ids[i].replace(/widget-[0-9]*_/,'widget-');
     fm_listen(fm_ids[i]);
     }

     //holds the array value for later use without tainting the fm_ids variable.
     var fm_ids_dump = fm_ids;
     //assign the value of the last element of the array. We'll use this to find the array number.
     var fm_last_id = fm_ids_dump.pop();
     //console.log(fm_last_id);
     //Get rid of everything except for the number at the end;
     var fm_id_stripped = Number(fm_last_id.replace(/widget-feature_me-/,''));


     for(var i = 0; i < 10; i++){
     //the next id number to add
     fm_id_stripped+=1;

     //Create 10 more event listeners as a contingency
     fm_listen('widget-feature_me-'+String(fm_id_stripped));
     }
});

function fm_listen(fm_id,hide){
    //console.log("fm_listen launched for id: "+fm_id);
    jQuery(function($){

        var title = $("#"+fm_id+"-title");
        var feature = $("#"+fm_id+"-feature");
        var defaultTitle= $("#"+fm_id+"-defaultTitle");
        var type = $("."+fm_id+"-type");
        var type_link = $("."+fm_id+"-type_link");
        var linkText = $("#"+fm_id+"-linkText");
        var type_url = $("."+fm_id+"-type_url");
        var linkURL = $("#"+fm_id+"-linkURL");
        var copy = $("."+fm_id+"-copy");
        var body = $("#"+fm_id+"-body");
        var currentSelection;

        title.on("change", function () {
            currentSelection = $("#"+fm_id+"-feature option:selected").text();
        });

        defaultTitle.on("click", function () {
            if (defaultTitle.attr("checked")) {
                featureMeTitle.attr("value", currentSelection);
            }
        });

        /*--Toggle Heading Title Options--*/
        //Hide custom title if the "default" is checked
        if (type.eq(0).attr('checked') == "checked") {
            title.hide();
        }
        //Hide custom title if "none" is checked
        if (type.eq(1).attr('checked') == "checked") {
            title.hide();
        }
        //Show body if the "custom" button is checked
        if (type.eq(2).attr('checked') == "checked") {
            title.show();
        }
        //Hide custom title when "default" is clicked
        type.eq(0).on('click', function () {
            title.hide();
        });
        //Hide custom title if "none" is clicked
        type.eq(1).on('click', function () {
            title.hide();
        });
        //Show custom title when "custom" is clicked
        type.eq(2).on('click', function () {
            title.show();
        });


        /*--Toggle Custom Body Options--*/
        //Hide body if the "excerpt" button is checked
        if (copy.eq(0).attr('checked') == "checked") {
            body.hide();
        }
        if (copy.eq(1).attr('checked') == "checked") {
            body.hide();
        }
        //Show body if the "custom" button is checked
        if (copy.eq(2).attr('checked') == "checked") {
            body.show();
        }

        //Hide body when "excerpt" button is clicked
        copy.eq(0).on('click', function () {
            body.hide();
        });
        copy.eq(1).on('click', function () {
            body.hide();
        });
        //Show body when "custom" button is clicked
        copy.eq(2).on('click', function () {
            body.show();
        });

        /*--Toggle Link Title Options--*/
        //Hide custom title if the "default" is checked
        if (type_link.eq(0).attr('checked') == "checked") {
            linkText.hide();
        }
        //Hide custom title if "none" is checked
        if (type_link.eq(1).attr('checked') == "checked") {
            linkText.hide();
        }
        //Show body if the "custom" button is checked
        if (type_link.eq(2).attr('checked') == "checked") {
            linkText.show();
        }
        //Hide custom title when "default" is clicked
        type_link.eq(0).on('click', function () {
            linkText.hide();
        });
        //Hide custom title if "none" is clicked
        type_link.eq(1).on('click', function () {
            linkText.hide();
        });
        //Show custom title when "custom" is clicked
        type_link.eq(2).on('click', function () {
            linkText.show();
        });

        /*--Toggle Link URL Options--*/
        //Hide custom title if the "default" is checked
        if (type_url.eq(0).attr('checked') == "checked") {
            linkURL.hide();
        }
        //Show body if the "custom" button is checked
        if (type_url.eq(1).attr('checked') == "checked") {
            linkURL.show();
        }
        //Hide custom title when "default" is clicked
        type_url.eq(0).on('click', function () {
            linkURL.hide();
        });
        //Show custom title when "custom" is clicked
        type_url.eq(1).on('click', function () {
            linkURL.show();
        });




        //Toggle Display of Options
        /*var count = 1;
        $("."+fm_id+"-show-options").on('click',function(e){

            if(count % 2 != 0){
                $(this).siblings('span').html('&#x25bc;');
                $(this).text('Hide Options');
            }
            else{
                $(this).siblings('span').html('&#x25b6;');
                $(this).text('Show Options');
            }

            $("."+fm_id+"-options").slideToggle({complete:
                function(){
                    count++;
                    console.log(count)
                }
            });

            e.preventDefault();
            return false;

        });*/

    });
}