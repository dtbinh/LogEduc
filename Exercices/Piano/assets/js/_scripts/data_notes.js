/**
 * Created by luk on 19/05/15.
 */
/* Les données sur les notes */
/* Level 2 */
var textBlanche2 = '{' +
    '"index": {"Do1": 0, "Re1": 1, "Mi1": 2, "Fa1": 3, "Sol1": 4, "La1": 5,"Si1": 6, "Do2": 7, "Re2": 8,"Mi2": 9, "Fa2": 10, "Sol2": 11, "La2": 12, "Si2": 13},' +
    '"data": [{"id": "Do1","tId": "1C","nom":"Do grave"},' +
    '{"id": "Re1","tId": "1D","nom":"Ré grave"},' +
    '{"id": "Mi1","tId": "1E","nom":"Mi grave"},' +
    '{"id":"Fa1","tId":"1F","nom":"Fa grave"},' +
    '{"id":"Sol1","tId":"1G","nom":"Sol grave"},' +
    '{"id":"La1","tId":"2A","nom":"La grave"},' +
    '{"id":"Si1","tId":"2B","nom":"Si grave"},' +
    '{"id":"Do2","tId":"2C","nom":"Do aigu"},' +
    '{"id":"Re2","tId":"2D","nom":"Ré aigu"},' +
    '{"id":"Mi2","tId":"2E","nom":"Mi aigu"},' +
    '{"id":"Fa2","tId":"2F","nom":"Fa aigu"},' +
    '{"id":"Sol2","tId":"2G","nom":"Sol aigu"},' +
    '{"id":"La2","tId":"3A","nom":"La aigu"},' +
    '{"id":"Si2","tId":"3B","nom":"Si aigu"}' +
    ']}';
var jsonTableauNoteBlanche2 = JSON.parse(textBlanche2);

var textNoire2 = '{' +
    '"index": {"Do1D": 0, "Re1B": 1, "Re1D": 2, "Mi1B": 3, "Fa1D": 4, "Sol1B": 5,"Sol1D": 6, "La1B": 7, "La1D": 8,"Si1B": 9,' +
    '"Do2D": 10, "Re2B": 11, "Re2D": 12, "Mi2B": 13, "Fa2D": 14, "Sol2B": 15, "Sol2D": 16, "La2B": 17, "La2D": 18, "Si2B": 19},' +
    '"data": [{"id": "Do1D","tId": "1Cs","nom":"Do Grave dièse"},' +
    '{"id": "Re1B","tId": "1Cs","nom":"Ré Grave bémol"},' +
    '{"id": "Re1D","tId": "1Ds","nom":"Ré Grave dièse"},' +
    '{"id": "Mi1B","tId": "1Ds","nom":"Mi Grave bémol"},' +
    '{"id": "Fa1D","tId": "1Fs","nom":"Fa Grave dièse"},' +
    '{"id": "Sol1B","tId": "1Fs","nom":"Sol Grave bémol"},' +
    '{"id": "Sol1D","tId": "1Gs","nom":"Sol Grave dièse"},' +
    '{"id": "La1B","tId": "1Gs","nom":"La Grave bémol"},' +
    '{"id": "La1D","tId": "2As","nom":"La Grave dièse"},' +
    '{"id": "Si1B","tId": "2As","nom":"Si Grave bémol"},' +
    '{"id": "Do2D","tId": "2Cs","nom":"Do Aigu dièse"},' +
    '{"id": "Re2B","tId": "2Cs","nom":"Ré Aigu bémol"},' +
    '{"id": "Re2D","tId": "2Ds","nom":"Ré Aigu dièse"},' +
    '{"id": "Mi2B","tId": "2Ds","nom":"Mi Aigu bémol"},' +
    '{"id": "Fa2D","tId": "2Fs","nom":"Fa Aigu dièse"},' +
    '{"id": "Sol2B","tId": "2Fs","nom":"Sol Aigu bémol"},' +
    '{"id": "Sol2D","tId": "2Gs","nom":"Sol Aigu dièse"},' +
    '{"id": "La2B","tId": "2Gs","nom":"La Aigu bémol"},' +
    '{"id": "La2D","tId": "3As","nom":"La Aigu dièse"},' +
    '{"id": "Si2B","tId": "3Bs","nom":"Si Aigu bémol"}' +
    ']}';
var jsonTableauNoteNoire2 = JSON.parse(textNoire2);
/* Fin Level 2 */

/* Level 1 */
var textBlanche1 = '{' +
    '"index": {"Do1": 0, "Re1": 1, "Mi1": 2, "Fa1": 3, "Sol1": 4, "La1": 5,"Si1": 6},' +
    '"data": [{"id": "Do1","tId": "1C","nom":"Do"},' +
    '{"id": "Re1","tId": "1D","nom":"Ré"},' +
    '{"id": "Mi1","tId": "1E","nom":"Mi"},' +
    '{"id":"Fa1","tId":"1F","nom":"Fa"},' +
    '{"id":"Sol1","tId":"1G","nom":"Sol"},' +
    '{"id":"La1","tId":"2A","nom":"La"},' +
    '{"id":"Si1","tId":"2B","nom":"Si"}' +
    ']}';
var jsonTableauNoteBlanche1 = JSON.parse(textBlanche1);

var textNoire1 = '{' +
    '"index": {"Do1D": 0, "Re1B": 1, "Re1D": 2, "Mi1B": 3, "Fa1D": 4, "Sol1B": 5,"Sol1D": 6, "La1B": 7, "La1D": 8,"Si1B": 9},' +
    '"data": [{"id": "Do1D","tId": "1Cs","nom":"Do dièse"},' +
    '{"id": "Re1B","tId": "1Cs","nom":"Ré bémol"},' +
    '{"id": "Re1D","tId": "1Ds","nom":"Ré dièse"},' +
    '{"id": "Mi1B","tId": "1Ds","nom":"Mi bémol"},' +
    '{"id": "Fa1D","tId": "1Fs","nom":"Fa dièse"},' +
    '{"id": "Sol1B","tId": "1Fs","nom":"Sol bémol"},' +
    '{"id": "Sol1D","tId": "1Gs","nom":"Sol dièse"},' +
    '{"id": "La1B","tId": "1Gs","nom":"La bémol"},' +
    '{"id": "La1D","tId": "2As","nom":"La dièse"},' +
    '{"id": "Si1B","tId": "2As","nom":"Si bémol"}' +
    ']}';
var jsonTableauNoteNoire1 = JSON.parse(textNoire1);

/* Fin des données sur les notes */

//
// Variables
// --------------------------------------------------

// Notes variables
var notes = {
    "1C": new Howl({
        urls: [ "assets/midia/261-C.mp3" ]
    }),
    "1Cs": new Howl({
        urls: [ "assets/midia/277-C-sharp.mp3" ]
    }),
    "1D": new Howl({
        urls: [ "assets/midia/293-D.mp3" ]
    }),
    "1Ds": new Howl({
        urls: [ "assets/midia/311-D-sharp.mp3" ]
    }),
    "1E": new Howl({
        urls: [ "assets/midia/329-E.mp3" ]
    }),
    "1F": new Howl({
        urls: [ "assets/midia/349-F.mp3" ]
    }),
    "1Fs": new Howl({
        urls: [ "assets/midia/369F-sharp.mp3" ]
    }),
    "1G": new Howl({
        urls: [ "assets/midia/391-G.mp3" ]
    }),
    "1Gs": new Howl({
        urls: [ "assets/midia/415-G-sharp.mp3" ]
    }),
    "2A": new Howl({
        urls: [ "assets/midia/440-A.mp3" ]
    }),
    "2As": new Howl({
        urls: [ "assets/midia/466-A-sharp.mp3" ]
    }),
    "2B": new Howl({
        urls: [ "assets/midia/495-B.mp3" ]
    }),
    "2C": new Howl({
        urls: [ "assets/midia/523-C.mp3" ]
    }),
    "2Cs": new Howl({
        urls: [ "assets/midia/545-C-sharp.mp3" ]
    }),
    "2D": new Howl({
        urls: [ "assets/midia/587-D.mp3" ]
    }),
    "2Ds": new Howl({
        urls: [ "assets/midia/622-D-sharp.mp3" ]
    }),
    "2E": new Howl({
        urls: [ "assets/midia/659-E.mp3" ]
    }),
    "2F": new Howl({
        urls: [ "assets/midia/698-F.mp3" ]
    }),
    "2Fs": new Howl({
        urls: [ "assets/midia/698-F-sharp.mp3" ]
    }),
    "2G": new Howl({
        urls: [ "assets/midia/783-G.mp3" ]
    }),
    "2Gs": new Howl({
        urls: [ "assets/midia/830-G-sharp.mp3" ]
    }),
    "3A": new Howl({
        urls: [ "assets/midia/880-A.mp3" ]
    }),
    "3As": new Howl({
        urls: [ "assets/midia/932-A-sharp.mp3" ]
    }),
    "3B": new Howl({
        urls: [ "assets/midia/987-B.mp3" ]
    })
};

// Aide réponses

/* Level 1 */
var aideReponseNoteSimple = '{' +
    '"index": {"Do1": 0, "Re1": 1, "Mi1": 2, "Fa1": 3, "Sol1": 4, "La1": 5,"Si1": 6,' +
    '"Do1D": 7, "Re1B": 8, "Re1D": 9, "Mi1B": 10, "Fa1D": 11, "Sol1B": 12,"Sol1D": 13, "La1B": 14, "La1D": 15,"Si1B": 16},' +
    '"data": [{"id": "Do1","tId": "1C","nom":"Do", "before":"Si", "after":"Ré"},' +
    '{"id": "Re1","tId": "1D","nom":"Ré", "before":"Do", "after":"Mi"},' +
    '{"id": "Mi1","tId": "1E","nom":"Mi", "before":"Ré", "after":"Fa"},' +
    '{"id":"Fa1","tId":"1F","nom":"Fa", "before":"Mi", "after":"Sol"},' +
    '{"id":"Sol1","tId":"1G","nom":"Sol", "before":"Fa", "after":"La"},' +
    '{"id":"La1","tId":"2A","nom":"La", "before":"Sol", "after":"Si"},' +
    '{"id":"Si1","tId":"2B","nom":"Si", "before":"La", "after":"Do"},' +
    '{"id": "Do1D","tId": "1Cs","nom":"Do Grave dièse", "before":"Do", "after":"Ré"},' +
    '{"id": "Re1B","tId": "1Cs","nom":"Ré bémol", "before":"Do", "after":"Ré"},' +
    '{"id": "Re1D","tId": "1Ds","nom":"Ré dièse","before":"Ré", "after":"Mi"},' +
    '{"id": "Mi1B","tId": "1Ds","nom":"Mi bémol", "before":"Ré", "after":"Mi"},' +
    '{"id": "Fa1D","tId": "1Fs","nom":"Fa dièse", "before":"Fa", "after":"Sol"},' +
    '{"id": "Sol1B","tId": "1Fs","nom":"Sol bémol", "before":"Fa", "after":"Sol"},' +
    '{"id": "Sol1D","tId": "1Gs","nom":"Sol dièse", "before":"Sol", "after":"La"},' +
    '{"id": "La1B","tId": "1Gs","nom":"La bémol", "before":"Sol", "after":"La"},' +
    '{"id": "La1D","tId": "2As","nom":"La dièse", "before":"La", "after":"Si"},' +
    '{"id": "Si1B","tId": "2As","nom":"Si bémol", "before":"La", "after":"Si"}' +
    ']}';
var jsonAideReponseNoteSimple = JSON.parse(aideReponseNoteSimple);

/* Level 2 */
var aideReponseNoteLong = '{' +
    '"index": {"Do1": 0, "Re1": 1, "Mi1": 2, "Fa1": 3, "Sol1": 4, "La1": 5,"Si1": 6,' +
    ' "Do2": 7, "Re2": 8,"Mi2": 9, "Fa2": 10, "Sol2": 11, "La2": 12, "Si2": 13,' +
    '"Do1D": 14, "Re1B": 15, "Re1D": 16, "Mi1B": 17, "Fa1D": 18, "Sol1B": 19,"Sol1D": 20, "La1B": 21, "La1D": 22,"Si1B": 23,' +
    '"Do2D": 24, "Re2B": 25, "Re2D": 26, "Mi2B": 27, "Fa2D": 28, "Sol2B": 29, "Sol2D": 30, "La2B": 31, "La2D": 32, "Si2B": 33},' +
    '"data": [{"id": "Do1","tId": "1C","nom":"Do grave"},' +
    '{"id": "Re1","tId": "1D","nom":"Ré grave"},' +
    '{"id": "Mi1","tId": "1E","nom":"Mi grave"},' +
    '{"id":"Fa1","tId":"1F","nom":"Fa grave"},' +
    '{"id":"Sol1","tId":"1G","nom":"Sol grave"},' +
    '{"id":"La1","tId":"2A","nom":"La grave"},' +
    '{"id":"Si1","tId":"2B","nom":"Si grave"},' +
    '{"id":"Do2","tId":"2C","nom":"Do aigu"},' +
    '{"id":"Re2","tId":"2D","nom":"Ré aigu"},' +
    '{"id":"Mi2","tId":"2E","nom":"Mi aigu"},' +
    '{"id":"Fa2","tId":"2F","nom":"Fa aigu"},' +
    '{"id":"Sol2","tId":"2G","nom":"Sol aigu"},' +
    '{"id":"La2","tId":"3A","nom":"La aigu"},' +
    '{"id":"Si2","tId":"3B","nom":"Si aigu"},' +
    '{"id": "Do1D","tId": "1Cs","nom":"Do Grave dièse"},' +
    '{"id": "Re1B","tId": "1Cs","nom":"Ré Grave bémol"},' +
    '{"id": "Re1D","tId": "1Ds","nom":"Ré Grave dièse"},' +
    '{"id": "Mi1B","tId": "1Ds","nom":"Mi Grave bémol"},' +
    '{"id": "Fa1D","tId": "1Fs","nom":"Fa Grave dièse"},' +
    '{"id": "Sol1B","tId": "1Fs","nom":"Sol Grave bémol"},' +
    '{"id": "Sol1D","tId": "1Gs","nom":"Sol Grave dièse"},' +
    '{"id": "La1B","tId": "1Gs","nom":"La Grave bémol"},' +
    '{"id": "La1D","tId": "2As","nom":"La Grave dièse"},' +
    '{"id": "Si1B","tId": "2As","nom":"Si Grave bémol"},' +
    '{"id": "Do2D","tId": "2Cs","nom":"Do Aigu dièse"},' +
    '{"id": "Re2B","tId": "2Cs","nom":"Ré Aigu bémol"},' +
    '{"id": "Re2D","tId": "2Ds","nom":"Ré Aigu dièse"},' +
    '{"id": "Mi2B","tId": "2Ds","nom":"Mi Aigu bémol"},' +
    '{"id": "Fa2D","tId": "2Fs","nom":"Fa Aigu dièse"},' +
    '{"id": "Sol2B","tId": "2Fs","nom":"Sol Aigu bémol"},' +
    '{"id": "Sol2D","tId": "2Gs","nom":"Sol Aigu dièse"},' +
    '{"id": "La2B","tId": "2Gs","nom":"La Aigu bémol"},' +
    '{"id": "La2D","tId": "3As","nom":"La Aigu dièse"},' +
    '{"id": "Si2B","tId": "3Bs","nom":"Si Aigu bémol"}' +
    ']}';
var jsonAideReponseNoteLong = JSON.parse(aideReponseNoteLong);