(function ($) {
    $(document).ready(function () {
        "use strict";

        // MASONRY
        var $container = $(".masonry");
        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: ".masonry li",
                layoutMode: "masonry",
            });
        });

        // TAB
        $(".tab-nav li").on("click", function (e) {
            $(".tab-item").hide();
            $(".tab-nav li").removeClass("active");
            $(this).addClass("active");
            var selected_tab = $(this).find("a").attr("href");
            $(selected_tab).stop().show();
            return false;
        });

        /* MENU TOGGLE */
        $(".side-widget .site-menu ul li a").on("click", function (e) {
            $(this)
                .parent()
                .children(".side-widget .site-menu ul li ul")
                .toggle();
            return true;
        });

        // SEARCH BOX
        $(".navbar .search-button").on("click", function (e) {
            $(this).toggleClass("open");
            $(".search-box").toggleClass("active");
        });

        // HAMBURGER MENU
        $(".hamburger-menu").on("click", function (e) {
            $(this).toggleClass("open");
            $(".side-widget").toggleClass("active");
        });

        // PAGE TRANSITION
        $("body a").on("click", function (e) {
            var target = $(this).attr("target");
            var fancybox = $(this).data("fancybox");
            var url = this.getAttribute("href");
            if (
                target != "_blank" &&
                typeof fancybox == "undefined" &&
                url.indexOf("#") < 0
            ) {
                e.preventDefault();
                var url = this.getAttribute("href");
                if (url.indexOf("#") != -1) {
                    var hash = url.substring(url.indexOf("#"));

                    if ($("body " + hash).length != 0) {
                        $(".page-transition").removeClass("active");
                    }
                } else {
                    $(".page-transition").toggleClass("active");
                    setTimeout(function () {
                        window.location = url;
                    }, 1000);
                }
            }
        });
    });
    // END DOCUMENT READY

    // MAIN SLIDER
    var swiper = new Swiper(".main-slider", {
        slidesPerView: "1",
        spaceBetween: 0,
        speed: 600,
        loop: "true",
        touchRatio: 0,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".button-next",
            prevEl: ".button-prev",
        },
    });

    // SIDE SLIDER
    var swiper = new Swiper(".side-slider .slider", {
        slidesPerView: "1",
        spaceBetween: 0,
        loop: "true",
        speed: 600,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // EXPERTS SLIDER
    var swiper = new Swiper(".experts-slider", {
        slidesPerView: "1",
        spaceBetween: 0,
        loop: "true",
        speed: 600,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // HIGHLIGHT SLIDER
    var swiper = new Swiper(".highlight-slider", {
        slidesPerView: "1",
        spaceBetween: 0,
        speed: 600,
        touchRatio: 0,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".custom-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return (
                    '<span class="' +
                    className +
                    '">0' +
                    (index + 1) +
                    "</span>"
                );
            },
        },
    });

    // CAROUSEL IMAGE BOX
    var swiper = new Swiper(".carousel-image-box", {
        slidesPerView: "4",
        spaceBetween: 40,
        speed: 600,
        //touchRatio: 0,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
    });

    // CAROUSEL TESTIMONIALS
    var swiper = new Swiper(".testimonials-slider", {
        slidesPerView: "1",
        spaceBetween: 0,
        speed: 600,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // DATA BACKGROUND IMAGE
    var pageSection = $("*");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css(
                "background",
                "url(" + $(this).data("background") + ")"
            );
        }
    });

    // DATA BACKGROUND COLOR
    var pageSection = $("*");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background", $(this).data("background"));
        }
    });

    // COUNTER
    $(document).scroll(function () {
        $(".odometer").each(function () {
            var parent_section_postion = $(this).closest("section").position();
            var parent_section_top = parent_section_postion.top;
            if ($(document).scrollTop() > parent_section_top - 300) {
                if ($(this).data("status") == "yes") {
                    $(this).html($(this).data("count"));
                    $(this).data("status", "no");
                }
            }
        });
    });

    // PRELOADER
    $(window).load(function () {
        $("body").addClass("page-loaded");
    });
})(jQuery);

// ===== PACKAGE REGISTRATION =====

// Generate a tracking number
function generateTrackingNumber() {
    const prefix = "TRK";
    const year = new Date().getFullYear();
    const randomNum = Math.floor(100000 + Math.random() * 900000);
    return `${prefix}-${year}-${randomNum}`;
}

// Validate dimensions format
function validateDimensions(dimensions) {
    const pattern = /^\d+×\d+×\d+$/;
    return pattern.test(dimensions);
}

// Format dimensions for display
function formatDimensions(dimensions) {
    return dimensions.replace(/×/g, " × ");
}

// Calculate estimated delivery date
function calculateDeliveryDate(serviceType) {
    const today = new Date();
    const deliveryDate = new Date();

    switch (serviceType) {
        case "express":
            deliveryDate.setDate(today.getDate() + 2);
            break;
        case "priority":
            deliveryDate.setDate(today.getDate() + 1);
            break;
        default: // standard
            deliveryDate.setDate(today.getDate() + 5);
            break;
    }

    return deliveryDate.toLocaleDateString("en-US", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    });
}

// Calculate shipping cost
function calculateCost(weight, serviceType, insurance) {
    let baseCost = weight * 2; // $2 per kg
    let serviceMultiplier = 1;

    switch (serviceType) {
        case "express":
            serviceMultiplier = 2;
            break;
        case "priority":
            serviceMultiplier = 3;
            break;
    }

    let insuranceCost = insurance * 0.01; // 1% of insured value
    return (baseCost * serviceMultiplier + insuranceCost).toFixed(2);
}

// DOM Elements
const packageForm = document.getElementById("packageForm");
const successModal = document.getElementById("successModal");
const modalClose = document.getElementById("modalClose");
const generatedTrackingNumber = document.getElementById(
    "generatedTrackingNumber"
);
const printReceipt = document.getElementById("printReceipt");
const trackPackage = document.getElementById("trackPackage");
const registerAnother = document.getElementById("registerAnother");

// Form submission
packageForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Validate dimensions format
    const dimensions = document.getElementById("packageDimensions").value;
    if (!validateDimensions(dimensions)) {
        alert(
            "Please enter dimensions in the format: 30×20×10 (length×width×height)"
        );
        return;
    }

    // Generate tracking number
    const trackingNumber = generateTrackingNumber();
    generatedTrackingNumber.textContent = trackingNumber;

    // Store package data (in a real app, this would be sent to a server)
    const packageData = {
        trackingNumber: trackingNumber,
        sender: {
            name: document.getElementById("senderName").value,
            phone: document.getElementById("senderPhone").value,
            address: document.getElementById("senderAddress").value,
            city: document.getElementById("senderCity").value,
        },
        recipient: {
            name: document.getElementById("recipientName").value,
            phone: document.getElementById("recipientPhone").value,
            address: document.getElementById("recipientAddress").value,
            city: document.getElementById("recipientCity").value,
        },
        package: {
            type: document.getElementById("packageType").value,
            weight: document.getElementById("packageWeight").value,
            dimensions: formatDimensions(dimensions),
            description: document.getElementById("packageDescription").value,
        },
        service: {
            type: document.getElementById("serviceType").value,
            insurance: document.getElementById("insurance").value,
            cost: calculateCost(
                parseFloat(document.getElementById("packageWeight").value),
                document.getElementById("serviceType").value,
                parseFloat(document.getElementById("insurance").value)
            ),
            estimatedDelivery: calculateDeliveryDate(
                document.getElementById("serviceType").value
            ),
        },
        status: "registered",
        createdAt: new Date().toISOString(),
    };

    // Store in localStorage (for demo purposes)
    let shipments = JSON.parse(
        localStorage.getItem("cargomax_shipments") || "[]"
    );
    shipments.push(packageData);
    localStorage.setItem("cargomax_shipments", JSON.stringify(shipments));

    // Show success modal
    successModal.classList.add("active");
});

// Modal actions
modalClose.addEventListener("click", function () {
    successModal.classList.remove("active");
});

printReceipt.addEventListener("click", function () {
    window.print();
});

trackPackage.addEventListener("click", function () {
    // Redirect to tracking page with the tracking number
    const trackingNumber = generatedTrackingNumber.textContent;
    window.location.href = `track.html?tracking=${trackingNumber}`;
});

registerAnother.addEventListener("click", function () {
    successModal.classList.remove("active");
    packageForm.reset();
});

// Close modal when clicking outside
successModal.addEventListener("click", function (e) {
    if (e.target === successModal) {
        successModal.classList.remove("active");
    }
});

// ===== TRACKING-RESULTS PAGE =====
// Simple JavaScript for demonstration purposes
document.addEventListener("DOMContentLoaded", function () {
    // Toggle sidebar on mobile
    const sidebarToggle = document.querySelector(".sidebar .icon-button");
    const sidebar = document.querySelector(".sidebar");

    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", function () {
            sidebar.classList.toggle("open");
        });
    }

    // Simulate tracking button click
    const trackButton = document.querySelector(".btn-primary");
    if (trackButton) {
        trackButton.addEventListener("click", function () {
            alert("Tracking information updated!");
        });
    }

    // Recent tags functionality
    const tags = document.querySelectorAll(".tag");
    tags.forEach((tag) => {
        tag.addEventListener("click", function () {
            const trackingInput = document.querySelector(
                ".tracking-input input"
            );
            trackingInput.value = this.textContent;
        });
    });
});
