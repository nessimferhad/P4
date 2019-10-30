class Cards {

    displayCard0() {      
        
        let card_header0 = document.getElementById("card-header0");
        card_header0.textContent = "Venez visitez mon instragram !";

        let card_title0 = document.getElementById("card-title0");
        card_title0.textContent = "Il est regulièrement mit à jour avec les photos de mes aventures!";

        let card_img0 = document.getElementById("card-image0");
        card_img0.setAttribute("src", "libraries/public/images/Alaska02.jpg")

        let card_text0 = document.getElementById("card-text0");
        card_text0.textContent = "Vous y trouverez pleins de paysages fabuleux et n'hésitez pas a me faire part de vos avis via les commentaires !"

        let card_link0 = document.getElementById("card-link0");
        card_link0.textContent = "Mon instagram : @JeanForteroche";

        }

        displayCard1() {      
        
            let card_header1 = document.getElementById("card-header1");
            card_header1.textContent = "Aller voir le site de mon partenaire :";
    
            let card_title1 = document.getElementById("card-title1");
            card_title1.textContent = "La francaise des circuits!";
    
            let card_img1 = document.getElementById("card-image1");
            card_img1.setAttribute("src", "libraries/public/images/logopartenaire.png")
    
            let card_text1 = document.getElementById("card-text1");
            card_text1.textContent = "Vous y trouverez pleins circuit dans plein de régions différentes et pour tout les gouts !"
    
            let card_link1 = document.getElementById("card-link1");
            card_link1.textContent = "https://www.lafrancaisedescircuits.fr/";
    
            }

            displayCard2() {      
        
                let card_header2 = document.getElementById("card-header2");
                card_header2.textContent = "Venez me retrouver sur facebook :";
        
                let card_title2 = document.getElementById("card-title2");
                card_title2.textContent = "J'y poste souvent des résumé de mes aventures au jour le jour!";
        
                let card_img2 = document.getElementById("card-image2");
                card_img2.setAttribute("src", "libraries/public/images/meeting.jpg")
        
                let card_text2 = document.getElementById("card-text2");
                card_text2.textContent = "Vous aurez aussi des infos sur les differents évènements ou je serai présent !"
        
                let card_link2 = document.getElementById("card-link2");
                card_link2.textContent = "Mon facebook: #JeanForteroche";
        
                }

    }

let testcard = new Cards();
testcard.displayCard0();
testcard.displayCard1();
testcard.displayCard2();