$(document).ready(function() {
    var selectedItems = [];

    // Pobierz dane z pliku JSON
    $.getJSON('query.json', function(data) {
        // Losowa permutacja indeksów
        var indices = [...Array(data.length).keys()];
        indices.sort(() => Math.random() - 0.5);
        console.log(data);
        // Dodaj obiekty do #bingo w losowej kolejności
        for (let i = 0; i < 9; i++) {
            var item = data[indices[i]];
            $('#bingo').append('<div class="bingo-item" data-id="' + (i+1) + '">' + item.query + '</div>');
        }
        

        // Ustaw obsługę kliknięcia
        $('.bingo-item').click(function() {
            $(this).toggleClass('clicked');
            var id = $(this).data('id');
            if (selectedItems.indexOf(id) === -1) {
                selectedItems.push(id);
            } else {
                selectedItems.splice(selectedItems.indexOf(id), 1);
            }
            checkWin();
        });
    });

    function checkWin() {
        var possibleWins = [
            [1,2,3],
            [4,5,6],
            [7,8,9],
            [1,4,7],
            [2,5,8],
            [3,6,9],
            [1,5,9],
            [3,5,7]
        ];

        for (var i = 0; i < possibleWins.length; i++) {
            var win = true;
            for (var j = 0; j < possibleWins[i].length; j++) {
                if (selectedItems.indexOf(possibleWins[i][j]) === -1) {
                    win = false;
                    break;
                }
            }
            if (win) {
                var playerName = prompt('Gratulacje! Wprowadź swoją nazwę:');
                if (playerName !== 'anonom') {
                    alert('Wygrałeś!');
                    location.replace("sendemail.php?name=" + playerName);
                }
                break;
            }
        }
    }


});