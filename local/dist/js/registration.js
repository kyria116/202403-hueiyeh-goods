new TwCitySelector({el:".city-selector",elCounty:".county",elDistrict:".district2",standardWords:!0}),$("select").change((function(){$(this).css("color","black")})),$("input[type='date']").change((function(){$(this).css("color","black")}));for(var delCartElements=document.getElementsByClassName("del_cart"),i=0;i<delCartElements.length;i++)delCartElements[i].addEventListener("click",(function(){var e=this.closest(".form_block");e&&e.remove()}));var delGiveawayElements=document.getElementsByClassName("del_giveaway");for(i=0;i<delGiveawayElements.length;i++)delGiveawayElements[i].addEventListener("click",(function(){var e=this.closest(".form_item");e&&e.remove()}));