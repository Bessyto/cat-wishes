/**
 * catApi.js
 * Cat-Wishes Final Project
 * IT-328
 * Melanie Felton
 * Bessy Torres-Miller
 *
 * This file has the JSON code to use an API from Pet Finder and retrieve the result as html
 *
 */

//search button is clicked
$("#search").click(function(){

    //Define the variable the user enter
    var item = $("#searchTerm").val();
    //$("#name").html("");

    var url = "http://api.petfinder.com/pet.find?format=json&key=7dcf425006a4a9342ee8d6975483e187&animal=cat";
    url+= "&location=" + item;
    url+=  "&output=full&callback=?";

    $.getJSON(url)
        .done(function(petApiData) {

                $.each(petApiData.petfinder.pets.pet, function (index, pet) {
                    var output = "<div class='col-md-4 p-4 border rounded'><h3> Name: " + pet.name.$t + "</h3>";
                    output += "<h4>Gender: " + pet.sex.$t + "&emsp;&emsp;City: " + pet.contact.city.$t + "</h4>";
                    try
                    {
                        output += '<img src="' + pet.media.photos.photo[2].$t + '" ><hr>';
                    }
                    catch (err)
                    {

                    }
                    output += "<p> Description: " + pet.description.$t + "</p></div>";
                    $("#name").append(output);
                });
        })
        .error(function(err) {
            alert('Error retrieving data!');
        });
});