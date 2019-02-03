$(document).ready(function(){

    if ($(".login__phone input").length) {
         $(".login__phone input").mask("+9 (999) 999 99 99");
    }

    $('.login__phone p').on("click" ,function(){
        $(this).css("display" , "none");
        $(".login__phone input").focus();
    });
    $(".login__phone input").on("focus" , function(){
        $(".login__phone p").css("display" , 'none');
    });
    $(".login__phone input").on('focusout' , function(){
        if ($(this).val().length == 0) {
            $(".login__phone p").fadeIn(400);
        }
    });
	if ($("#map").length) {
		ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [55.751574, 37.573856],
            zoom: 9,
            controls: ['geolocationControl']
        }),
    	myPlacemark = new ymaps.Placemark([55.751574, 37.573856], {
            hintContent: 'Москва',
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'img/location.png',
            iconImageSize: [28, 39],
            iconImageOffset: [-5, -38]
        });
    	MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div class="deltaOmega" style="color: #FFFFFF; font-weight: bold;text-align:center;word-break:keep-all">$[properties.iconContent]</div>'
        ),
    	myPlacemarkWithContent = new ymaps.Placemark([55.730574, 37.573656], {
            hintContent: 'Улица Гагарина',
            balloonContent: 'Улица Гагарина',
            iconContent: '40 Р.'
        }, {
            iconLayout: 'default#imageWithContent',
            iconImageHref: 'img/rect.png',
            iconImageSize: [51, 24],
            iconImageOffset: [0, 0],
            iconContentOffset: [0, 0],
            iconContentLayout: MyIconContentLayout
        });
        myPlacemarkWithContent2 = new ymaps.Placemark([55.720574, 37.283656], {
            hintContent: 'Улица Гагарина2',
            balloonContent: 'Улица Гагарина2',
            iconContent: '80 Р.'
        }, {
            iconLayout: 'default#imageWithContent',
            iconImageHref: 'img/rect.png',
            iconImageSize: [51, 24],
            iconImageOffset: [0, 0],
            iconContentOffset: [0, 0],
            iconContentLayout: MyIconContentLayout
        });
        myPlacemarkWithContent3 = new ymaps.Placemark([55.630574, 37.423656], {
            hintContent: 'Улица Гагарина3',
            balloonContent: 'Улица Гагарина3',
            iconContent: '120 Р.'
        }, {
            iconLayout: 'default#imageWithContent',
            iconImageHref: 'img/rect.png',
            iconImageSize: [51, 24],
            iconImageOffset: [0, 0],
            iconContentOffset: [0, 0],
            iconContentLayout: MyIconContentLayout
        });
        myPlacemarkWithContent4 = new ymaps.Placemark([55.690574, 37.473656], {
            hintContent: 'Улица Гагарина5',
            balloonContent: 'Улица Гагарина5',
            iconContent: '160 Р.'
        }, {
            iconLayout: 'default#imageWithContent',
            iconImageHref: 'img/rect.png',
            iconImageSize: [51, 24],
            iconImageOffset: [0, 0],
            iconContentOffset: [0, 0],
            iconContentLayout: MyIconContentLayout
        });

         var myGeoObject = new ymaps.GeoObject({
            geometry: {
                type: "LineString",
                coordinates: [
                    [55.80, 37.50],
                    [55.70, 37.40]
                ]
            },
            properties:{
                hintContent: "line1",
                balloonContent: "line1"
            }
        }, {
            draggable: false,
            strokeColor: "#0E3FB3",
            strokeWidth: 3
        });

         var myGeoObject2 = new ymaps.GeoObject({
            geometry: {
                type: "LineString",
                coordinates: [
                    [55.80, 35.70],
                    [55.76, 35.40]
                ]
            },
            properties:{
                hintContent: "line2",
                balloonContent: "line2"
            }
        }, {
            draggable: false,
            strokeColor: "#0E3FB3",
            strokeWidth: 3
        });


           var myGeoObject3 = new ymaps.GeoObject({
            geometry: {
                type: "LineString",
                coordinates: [
                    [55.96, 37.84],
                    [55.30, 37.220]
                ]
            },
            properties:{
                hintContent: "line2",
                balloonContent: "line2"
            }
        }, {
            draggable: false,
            strokeColor: "#0E3FB3",
            strokeWidth: 3
        });


           var myGeoObject4 = new ymaps.GeoObject({
            geometry: {
                type: "LineString",
                coordinates: [
                    [55.00, 37.00],
                    [54.00, 36.00]
                ]
            },
            properties:{
                hintContent: "line2",
                balloonContent: "line2"
            }
        }, {
            draggable: false,
            strokeColor: "#0E3FB3",
            strokeWidth: 3
        });


		myMap.geoObjects.add(myPlacemark)
						.add(myGeoObject)
						.add(myGeoObject2)
						.add(myGeoObject3)
						.add(myGeoObject4);
		myMap.geoObjects.add(myPlacemarkWithContent);
		myMap.geoObjects.add(myPlacemarkWithContent2);
		myMap.geoObjects.add(myPlacemarkWithContent3);
		myMap.geoObjects.add(myPlacemarkWithContent4);
        // Creating a custom layout for the zoom slider.
        ZoomLayout = ymaps.templateLayoutFactory.createClass("<div>" +
            "<div id='zoom-in' class='btn'><i class='icon-plus'></i></div><br>" +
            "<div id='zoom-out' class='btn'><i class='icon-minus'></i></div>" +
            "</div>", {

            /**
             * Redefining methods of the layout, in order to perform
             * additional steps when building and clearing the layout.
             */
            build: function () {
                // Calling the "build" parent method.
                ZoomLayout.superclass.build.call(this);

                /**
                 * Binding handler functions to the context and storing references
                 * to them in order to unsubscribe from the event later.
                 */
                this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
                this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);

                // Beginning to listen for clicks on the layout buttons.
                $('#zoom-in').bind('click', this.zoomInCallback);
                $('#zoom-out').bind('click', this.zoomOutCallback);
            },

            clear: function () {
                // Removing click handlers.
                $('#zoom-in').unbind('click', this.zoomInCallback);
                $('#zoom-out').unbind('click', this.zoomOutCallback);

                // Calling the "clear" parent method.
                ZoomLayout.superclass.clear.call(this);
            },

            zoomIn: function () {
                var map = this.getData().control.getMap();
                map.setZoom(map.getZoom() + 1, {checkZoomRange: true});
            },

            zoomOut: function () {
                var map = this.getData().control.getMap();
                map.setZoom(map.getZoom() - 1, {checkZoomRange: true});
            }
        }),
        zoomControl = new ymaps.control.ZoomControl({options: {layout: ZoomLayout}});

    myMap.controls.add(zoomControl);
}

	}



	if ($(".outer_header_cards").length) {
		$(".outer_header_cards").slick({
			slidesToShow: 1,
			centerMode: true,
			arrows:false,
			centerPadding: '120px',
			responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        centerPadding: '80px'
		      }
		    },
		    {
		      breakpoint: 400,
		      settings: {
		        centerPadding: '60px'
		      }
		    },

		    {
		      breakpoint: 360,
		      settings: {
		        centerPadding: '55px'
		      }
		    },
		    {
		      breakpoint: 350,
		      settings: {
		        centerPadding: '50px'
		      }
		    },
		    {
		      breakpoint: 340,
		      settings: {
		        centerPadding: '45px'
		      }
		    },
			]
		});
	}


	$('.elem_checkbox_car p').on("click" , function(){
		$(this).prev().click();
	});

	$(".datecard>input").on("keyup" ,function(event){
	    console.log(event.keyCode);
	    if (event.keyCode != 8) {
	    	if ($(this).val().length == 2) {
				$(this).val($(this).val() + "/");
			}
	    }
		
	});


	$(".all_inps_card input").on("input" , function(){		
		if ($(this).val().length == 4) {
			if ($(this).next().length) {
				$(this).next().focus();
			}
		}
	});	



	$(document).on("click" , function(e){

		if ($('.menu_small').css("left") == "0px") {
			if (!e.target.closest(".menu_small")) {
				$('.menu_small').css("left" , "-340px");
			}
		}
	});

	$('.menu_top>img').on("click" , function(){
		$('.menu_small').css("left" , "0px");
	});
	$(".top_menu_small>img").on('click' , function(){
		$(".menu_small").css("left" , "-300px");
	});
	$(".inner_code input").on("input" , function(){		
			$(this).next().focus();
	});	
});