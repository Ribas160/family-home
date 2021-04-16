<template>
    <div>
        <div class="horizontal">
            <div class="horizontal-logo">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAhFBMVEVHcEz///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8yrJZjAAAAK3RSTlMA0GDAmOhQGJAgEIgH8fx6+QITMdUMPzi2q6JG3ONwG8RmI4wsVkydzISTQms0xQAAA0BJREFUeNrtm+tysjAQhlE5CRDOR4GKalVz//f3TQ1a8KuyIaGZzuT94TgjsA+b7GYTE0Wh127p7ct8ofludV4Vtv6h/KKcjVnhntDXR100vwORtLmLfxbKl8nc5i3vlXUit9zNaT68vDd/c4M6W0uE9rj5L/n7cBb7qfbk7XhVmF7bXNTi7A9/0jbcrGZp9yW4oL6ft14W9OMiak999yAv4GO/wLi6IRir3tNL/afO7uhFzxE5l2ZIyNsoyubb/b76up+HvRipMx7djjzrvP02b77v45b98ILfcCB46lx4NR5iRvG4umUHiIfx5YFuau7Y6JMZIO/bryJo6NT3SI1YAdS+++F5PrzHjLZmBPD6iUeH3xeY3U2xxQZwHGR5O6DKIMRvbBkpGwaBB7/TuYduwyMRPHxA0aRhF0EaW0pcDAloBvt1lz2vTACbwfjn0bUfGb7QgYlg75KhN782Om29der6IWMFejxmpBmp+7PRDU26IkpdGomFAThd9R4JI9AJgC0MQCEuqMUBXIgLUmEABwKginMBSaWuIzoSxbXBmq48DKJ2b4K1b6Px7EiGpD3MfrTAlIpHcwypznJY2vAxtdARVFZWoLFDwxPkjkwVGsIJCQMVT9IJVFEcwCFLrQoUBoA5ioOmAeAEUlYCVgyMifbx+0r1A5yJZgLYkYsyYQARuCaZCSADR8E3QGNYozIaIEAKnlE8AIBldE7lAYMCAFg9mDAA55ZeFoowAMVJvesyFAgAn8dIAAkgASSABJAAEkACMAAEOq0+d1wBnCnT6msiFgDj6iAYAMeOYIDhf0AiALaiAdxAMMBgxvanAYIlXG0+AwCdzqIBbAkgASSABJAAEkACSAAJIAEkgASQABJAAkiAEYAS9pjTbAAu6Ikf7mwAGG1Xo9oiPBlAHQPguonlf+1c/gDOAq54dJ1wCgDXhcrfBLCAAGgmgFoBASw2iXWs5wAoQADb25p6qPEHQCkIoNuHtuQPYCoQALf7fc0bwH86lMgEoNGqXtnR05mN8JWBw0gTcDvkqr3vhPWIh9iVv3rFc+pY+iv7aMUN4HNaIjpyA1BK5lzCqGTC3uqS72nzTRlTbG9GccnnhPM/YXoCUhYWc6QAAAAASUVORK5CYII=" alt="horizontal-logo">
                <div class="horizontal-text">Переверните ваше устройство в вертикальное положение, чтобы продолжить.</div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Horizontal',
    }
</script>
<style scoped>
    .horizontal {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1000;
        background-color: #333;
        display: none;
    }

    .horizontal-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 100%;
        padding: 0 10px;
        text-align: center;
    }

    .horizontal-logo img {
        width: 100px;
        margin-bottom: 10px;
    }

    .horizontal-text {
        font-size: 3vw;
        color: #ffffff;
    }

    @media (orientation: landscape) and (max-height: 500px) {
        .horizontal {
            display: block;
        }
    }
</style>
