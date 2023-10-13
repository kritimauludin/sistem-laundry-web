@ECHO OFF

start /b nginx.exe
@echo Starting Nginx....


ping 127.0.0.1-n 1>NUL
PING 127.0.0.1 >NUL