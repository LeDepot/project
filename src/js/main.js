
(function() {
    $(document).ready(function() {

        // Fonctionnement du menu en mobile
        // ===================================================
        $('header .menu').on('click', function() {
            $('header nav ul').toggleClass('active');
        });

        // Effet Lien Actif
        // ===================================================
        var nav = $('header nav'),
            navItem = nav.find('li a'),
            URI = window.location.pathname,
            URIfragments = URI.split('/'),
            URIpage = URIfragments[2];

        navItem.each(function() {
            if($(this).attr('href') == URIpage) {
                $(this).addClass('current-page');
            }
            else {
                $(this).removeClass('current-page');
            }
        });

        // Annule le comportement des liens "disabled"
        // ===================================================
        var noLink = $('a.disabled')
        noLink.on('click', function(e) {
            e.preventDefault();
        });

        // Carousel Matériel
        // ===================================================
        setInterval(function(){
            var taille = $('.listeImg img').width();
            $(".listeImg").animate({marginLeft:-taille},800,function(){
                $(this).css({marginLeft:0}).find("img:last").after($(this).find("img:first"));
            })
        }, 3500);

        // Retour à la liste du matériel
        // ===================================================
        $('.btn.retourListe').on('click', function(e) {
            e.preventDefault();
            window.history.back(-1);
        });

        // Affichage du pannier
        // ===================================================
        $('.user button.cart').on('click', function() {
            $('.panier').toggleClass('open');
        });

        // Fermeture du pannier
        // ===================================================
        $('.panier .cross').on('click', function() {
            $('.panier').removeClass('open');
        });

        

        var url = 'https://'+window.location.hostname+'/'+window.location.pathname;
        var url = url.split('index');
        var url = url[0]+'calendar.php';
        var urlCalendar = window.location.search;

        console.log(url);

        if(urlCalendar.length > 1 && urlCalendar == '?page=planning') {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function(reponse) {

                    console.log(reponse);

                    var title;
                    var description;
                    var datetime;

                    var listeResa = [];
                    /*$.each(reponse, function(key, value) {
                        

                        listeResa.push([
                            value.DATE_DEBUT+' - '+value.DATE_FIN+' | '+value.PERSONNE,
                            value.MATERIEL,
                            dateResa
                        ]);
                    });*/

                    $.each(reponse, function(key, value) {
                        var dateResa = value.DATE_DEBUT;
                        dateResa = dateResa.split('-');
                        var year = dateResa[0],
                            month = dateResa[1] - 1, // C DLA MERDE -- mais bon, ça marche
                            day = dateResa[2];

                        dateResa = new Date(year, month, day);

                        if(reponse.length > 1 && key < reponse.length) {
                            listeResa.push('{title: '+value.DATE_DEBUT+' - '+value.DATE_FIN+' | '+value.PERSONNE+', description: '+value.MATERIEL+', datetime: '+dateResa+'},')
                        } else {
                            listeResa.push('{title: '+value.DATE_DEBUT+' - '+value.DATE_FIN+' | '+value.PERSONNE+', description: '+value.MATERIEL+', datetime: '+dateResa+'}')
                        }
                    })               

                    var events = listeResa;
                    console.log(events);
                    // Création du calendrier
                    // ===================================================
                    /*$.each(reponse, function(key, value) {
                        console.log(value);
                   });

                    var events = array(
                        $.each(reponse, function(key, value) {
                            var nom = value.DATEDEBUT+' - '+value.DATEFIN+' | '+value.PERSONNE;
                            desc = value.MATERIEL;
                            array(
                                'title': nom,
                                'description': desc,
                                'datetime': '2017-03-15'
                            )
                        })
                    );
*/
                    //console.log(reponse);
                    /*var res = [];
                    $.each(reponse, function(){
                        res.push(this);
                    });

/*                    $('#calendar').eCalendar({url: 'loadCalendar'});
*/
/* console.log(res);*/

/*                    $('#calendar').eCalendar({
                        events: [
                        ]
                    });
*/
                    /*$('#calendar').eCalendar({url: 'loadCalendar',
                        weekDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        firstDayOfWeek: 1}); // calendar starting on monday | (0 - 6: week days format)
*/
                    //With links on the description
                    $('#calendar').eCalendar({
                        events: [ 
                            /*{
                                title: 'test',
                                description: 'teeeeest',
                                datetime: new Date(new Date().getFullYear(), new Date().getMonth(), '15')
                            },
                            {
                                title: 'test',
                                description: 'teeeeest',
                                datetime: new Date(new Date().getFullYear(), new Date().getMonth(), '24')
                            }*/

                            listeResa
                        ]
                    });

                },
                error: function() {
                    $('#message').html("");
                    var html="Impossible de charger le fichier";
                    $('#message').html(html);
                }
            });
        }

         // Initialisation de DataTable pour l'administration

                    $('#listeMateriel, #listeEtudiant').DataTable({
                        dom: 'Bfrtip',
                        "language":
                        {
                            "sEmptyTable":     "Aucun matériel disponible",
                            "sInfo":           "Affiche de  _START_ à _END_ sur _TOTAL_ résultats",
                            "sInfoEmpty":      "N'affiche aucun résultat",
                            "sInfoFiltered":   "",
                            "sInfoPostFix":    "",
                            "sInfoThousands":  ",",
                            "sLengthMenu":     "Montrer _MENU_ résultats",
                            "sLoadingRecords": "Chargement...",
                            "sProcessing":     "Traitement...",
                            "sSearch":         "Recherche:",
                            "sZeroRecords":    "Aucun résultat correspondant trouvé",
                            "oPaginate": {
                                "sFirst":    "Premier",
                                "sLast":     "Dernier",
                                "sNext":     "Suivant",
                                "sPrevious": "Précédent"
                            }
                        }
                    });

        

        // Affichage du panier
        $('.sub-nav-elm.cart').on('click', function() {
            //var url = "https://"+window.location.hostname+":8080"+window.location.pathname;
            var url = "http://"+window.location.hostname+':8080'+window.location.pathname;
            var url = url.split('index');
            var url = url[0]+"panier.php?id="+$('.id_session').attr('value');
            console.log(url)
            $.ajax({
                type: 'GET',
                url: url,
                dataType:'json',
                success: function(reponse) {
                    
                    $('.panier .content').html("");
                    var html = "";
                    $.each(reponse, function(key, value) {
                        html += '<div class="elmName"><p>'+value.NOM+'</p><form method="POST"><input class="hidden" name="id-materiel" type="text" value="'+value.ID+'" /><button name="suppPanier" type="submit"><i class="fa fa-times"></i></button></form></div>';
                        console.log(reponse);
                        console.log(key);
                    });
                    $('.panier .content').html(html);
                },
                error: function() {
                    $('.panier .content').html("");
                    var html="<div>Votre panier est vide.</div>";
                    $('.panier .content').html(html);
                    console.log('error');
                }
            })
        })
    });
})();