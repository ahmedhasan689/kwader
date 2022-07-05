require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.private('App.Models.User.' + userId)
    .notification(function(data) {
        var unread = Number($('#unread').text());
        unread++
        $('#unread').text(unread);

        document.getElementById('voice-alert').play();

        $('#notification-list').prepend(`
            <a href="${data.url}" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center gap-3">
                    <img src="${ data.icon }" class="rounded-circle" width="50" height="50" alt="">
                    <div>
                        <h6 class="mb-0 notify-text">${ data.title }</h6>
                        <span>
                                ${ data.body }
                            </span>
                        <div class="notify-histort text-muted">
                            <i class="bi bi-clock-history"></i>
                            <small>
                                ${ data.time }
                            </small>
                        </div>
                    </div>
                </div>
            </a>
        `)
    });
