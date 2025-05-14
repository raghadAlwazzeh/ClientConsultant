import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import arLocale from '@fullcalendar/core/locales/ar';

document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');
    
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        locale: arLocale,
        direction: 'rtl',
        headerToolbar: {
            right: 'today prev,next',
            center: 'title',
            left: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: {
            url: '/api/events',
            method: 'GET',
            extraParams: {
                user_id: document.querySelector('meta[name="user-id"]').content
            }
        },
        editable: true,
        eventClick: function(info) {
            showEventDetails(info.event);
        },
        eventDrop: function(info) {
            updateEventTime(info.event);
        },
        eventResize: function(info) {
            updateEventTime(info.event);
        },
        eventContent: function(info) {
            return {
                html: `<div class="fc-event-title">${info.event.title}</div>
                       <div class="fc-event-client">العميل: ${info.event.extendedProps.client_name}</div>`
            };
        }
    });

    calendar.render();

    // دالة عرض تفاصيل الحدث
    window.showEventDetails = function(event) {
        const modalContent = `
            <h3>${event.title}</h3>
            <p><strong>العميل:</strong> ${event.extendedProps.client_name}</p>
            <p><strong>الوصف:</strong> ${event.extendedProps.description || 'لا يوجد وصف'}</p>
            <p><strong>الوقت:</strong> ${event.start.toLocaleString('ar-EG')} - 
            ${event.end ? event.end.toLocaleString('ar-EG') : 'لا يوجد وقت انتهاء'}</p>
        `;
        Swal.fire({
            title: 'تفاصيل المهمة',
            html: modalContent,
            icon: 'info',
            confirmButtonText: 'حسناً'
        });
    };

    // دالة تحديث وقت الحدث
    window.updateEventTime = function(event) {
        fetch(`/events/${event.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                start_time: event.start.toISOString(),
                end_time: event.end ? event.end.toISOString() : null
            })
        }).catch(error => {
            console.error('Error updating event:', error);
            calendar.refetchEvents();
        });
    };
});