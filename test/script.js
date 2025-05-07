const ws = new WebSocket('ws://localhost:8080');
const input = document.getElementById('input');
const messages = document.getElementById('messages');

ws.onmessage = (event) => {
  const msg = document.createElement('div');
  msg.textContent = event.data;
  messages.appendChild(msg);
  messages.scrollTop = messages.scrollHeight;
};

input.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && input.value.trim() !== '') {
    ws.send(input.value);
    input.value = '';
  }
});
