$(document).ready(function(){
    const btnComment = $('.comment-btn')

    btnComment.on('click', function(){
        const usernameValue = $(this).data('username')
        const tweetValue = $(this).data('post_value')
        const nameValue = $(this).data('name')

        const modalUsername = $('.username')
        const modalTweetValue = $('.tweet-value')
        const modalNameValue = $('.name')

        modalUsername.text(usernameValue)
        modalTweetValue.text(tweetValue)
        modalNameValue.text(nameValue)

        const modalElement = $('.tweet-modal')
        modalElement.slideDown()

        const overlay = $('.overlay')
        overlay.show()

    })
})
