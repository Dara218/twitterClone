// $(document).ready(function(){
//     $('.comment-btn').on('click', function(){
//         const usernameValue = $(this).data('username')
//         const tweetValue = $(this).data('post_value')
//         const nameValue = $(this).data('name')

//         const modalUsername = $('.username')
//         const modalTweetValue = $('.tweet-value')
//         const modalNameValue = $('.name')

//         modalUsername.text(usernameValue)
//         modalTweetValue.text(tweetValue)
//         modalNameValue.text(nameValue)

//         const modalElement = $('.tweet-modal')
//         const overlay = $('.overlay')

//         modalElement.slideDown()
//         overlay.show()

//         // $('.fa-xmark').on('click', function(){
//         //     modalElement.slideUp()
//         //     overlay.hide()
//         // })
//     })

//     // $('.overlay').on('click', function() {
//     //     $('.post-modal').slideUp();
//     //     $(this).hide();
//     // });
// })

const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))