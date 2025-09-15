// (function () {
//   function labelFromClass(codeEl) {
//     const cls = Array.from(codeEl.classList).find(c => c.startsWith('language-'));
//     return cls ? cls.replace('language-', '').toUpperCase() : 'CODE';
//   }

//   function addUI(pre, code) {
//     pre.style.position = 'relative';

//     const badge = document.createElement('div');
//     badge.className = 'code-lang-badge';
//     badge.textContent = labelFromClass(code);

//     const btn = document.createElement('button');
//     btn.className = 'copy-btn';
//     btn.textContent = 'Copiar';

//     btn.addEventListener('click', async () => {
//       try {
//         await navigator.clipboard.writeText(code.innerText.trim());
//         const previous = btn.textContent;
//         btn.textContent = '¡Copiado!';
//         setTimeout(() => (btn.textContent = previous), 1200);
//       } catch {
//         btn.textContent = 'Error';
//         setTimeout(() => (btn.textContent = 'Copiar'), 1200);
//       }
//     });

//     pre.appendChild(badge);
//     pre.appendChild(btn);
//   }

//   document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('pre > code').forEach(code => {
//       const pre = code.parentElement;
//       if (pre.dataset.enhanced === '1') return;
//       pre.dataset.enhanced = '1';
//       addUI(pre, code);
//     });
//   });
// })();
